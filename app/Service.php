<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Service
 *
 * @property int $id
 * @property string $name
 * @property int|null $category_id
 * @property int $company_id
 * @property string $short_description
 * @property string $description
 * @property string $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Category|null $category
 * @property-read \App\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Keyword[] $keywords
 * @property-read int|null $keywords_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Service extends Model
{
    protected $fillable = [
        'name',
        'short_description',
        'description',
        'photo'
    ];

    public function keywords() {
        return $this->belongsToMany('App\Keyword', 'service_keyword_relation', 'service_id', 'keyword_id')->withTimestamps();
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function company() {
        return $this->belongsTo('App\Company', 'company_id');
    }

}
