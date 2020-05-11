<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
