<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use LaravelCustomRelation\HasCustomRelations;

/**
 * App\Enquiry
 *
 * @property int $id
 * @property string $type
 * @property string $title
 * @property string $description
 * @property int|null $category_id
 * @property int $creator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Category|null $category
 * @property-read \App\User $creator
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enquiry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enquiry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enquiry query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enquiry whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enquiry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enquiry whereCreatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enquiry whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enquiry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enquiry whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enquiry whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Enquiry whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Enquiry extends Model
{
    use HasCustomRelations;

    protected $fillable = [
        'type',
        'title',
        'description',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function creator() {
        return $this->belongsTo('App\User', 'creator_id');
    }

    public function relevantCompanies() {
        return $this->custom(
            Company::class,
            function ($relation) {
                $query = $relation->getQuery();
                $query->where(function ($q) {
                    if (!empty($this->category_id))
                        $q->where('companies.category_id', $this->category_id);
                    $q->where('companies.type', $this->type);
                });
            },
            function ($relation, $models) {
                $relation->getQuery()->orWhere(function ($q) use ($models) {
                    $models = collect($models);
                    if (!$models->contains('category_id', null))
                        $q->whereIn('companies.category_id', $models->pluck('category_id'));
                    $q->whereIn('companies.type', $models->pluck('type'));
                });
            },
            function (array $models, Collection $results, $relation, $customRelation) {
                $dictionary = [];

                foreach ($results as $result) {
                    $dictionary[$result->type][$result->category_id][] = $result;
                }

                foreach ($models as $model) {
                    if (empty($model->category_id))
                        $model->setRelation($relation, $results);
                    if (isset($dictionary[$type = $model->type][$category_id = $model->category_id])) {
                        $collection = collect($dictionary[$type][$category_id]);
                        $model->setRelation($relation, $collection);
                    }
                }

                return $models;
            }
        );
    }
}

