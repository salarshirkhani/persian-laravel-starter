<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SliderItem
 *
 * @property int $id
 * @property string $title
 * @property int $priority
 * @property string|null $image
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SliderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SliderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SliderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SliderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SliderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SliderItem whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SliderItem wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SliderItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SliderItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SliderItem whereUrl($value)
 * @mixin \Eloquent
 */
class SliderItem extends Model
{
    protected $fillable = [
        'title',
        'image',
        'priority',
        'url',
    ];

    protected $table = 'slider_items';
}
