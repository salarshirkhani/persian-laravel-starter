<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use LaravelCustomRelation\HasCustomRelations;
use function foo\func;

/**
 * App\Company
 *
 * @property int $id
 * @property string $name
 * @property string|null $logo
 * @property string $type
 * @property int|null $category_id
 * @property int|null $creator_id
 * @property string $short_description
 * @property string|null $description
 * @property string $province
 * @property string $city
 * @property string $address
 * @property string|null $social_instagram
 * @property string|null $social_telegram
 * @property string|null $social_facebook
 * @property string|null $social_twitter
 * @property string $phone_number
 * @property string|null $mobile_number
 * @property string|null $fax_number
 * @property float $latitude
 * @property float $longitude
 * @property string|null $website
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Category|null $category
 * @property-read \App\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Keyword[] $keywords
 * @property-read int|null $keywords_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Service[] $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereFaxNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereSocialFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereSocialInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereSocialTelegram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereSocialTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereWebsite($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    use HasCustomRelations;

    protected $fillable = [
        'name',
        'short_description',
        'description',

        'province',
        'city',
        'address',

        'phone_number',
        'mobile_number',
        'fax_number',

        'latitude',
        'longitude',

        'social_instagram',
        'social_telegram',
        'social_facebook',
        'social_twitter',

        'website',

        'type',
    ];

    public function keywords() {
        return $this->belongsToMany('App\Keyword', 'company_keyword_relation', 'company_id', 'keyword_id')->withTimestamps();
    }

    public function products() {
        if (!empty($this->type) && $this->type != 'product')
            throw new \LogicException("This company type doesn't support products.");

        return $this->hasMany('App\Product', 'company_id');
    }

    public function services() {
        if (!empty($this->type) && $this->type != 'service')
            throw new \LogicException("This company type doesn't support services.");

        return $this->hasMany('App\Service', 'company_id');
    }

    public function creator() {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function logo() {
        if (empty($this->logo))
            return asset('assets/images/unknown.jpg');
        else
            return \Storage::url($this->logo);
    }

    public function relevantEnquiries() {
        return $this->custom(
            Enquiry::class,
            function ($relation) {
                $query = $relation->getQuery();
                $query->where(function($q) use ($relation) {
                    $q->where(function ($q) use ($relation) {
                        $q->whereNull('enquiries.category_id')
                            ->orWhere('enquiries.category_id', $this->category_id);
                    })
                        ->where('enquiries.type', $this->type)
                        ->orderBy('created_at', 'desc');
                });
            },
            function ($relation, $models) {
                $models = collect($models);
                $relation->getQuery()
                    ->orWhere(function ($query) use ($models) {
                        $query->where(function ($q) use ($models) {
                            $q->whereIn('enquiries.category_id', $models->pluck('category_id'))
                                ->orWhereNull('enquiries.category_id');
                        })->whereIn('enquiries.type', $models->pluck('type'));
                    });
            },
            function (array $models, Collection $results, $relation, $customRelation) {
                $dictionary = [];
                $dictionary['global'] = [];
                foreach ($results as $result) {
                    if (empty($result->category_id))
                        $dictionary['global'][] = $result;
                    else
                        $dictionary[$result->type][$result->category_id][] = $result;
                }

                foreach ($models as $model) {
                    if (isset($dictionary[$type = $model->type][$category_id = $model->category_id])) {
                        $model->setRelation(
                            $relation,
                            collect($dictionary[$type][$category_id])
                                ->merge($dictionary['global'])
                                ->sortByDesc('created_at')->values());
                    } else
                        $model->setRelation($relation, collect($dictionary['global']));
                }

                return $models;
            }
        );
    }
}
