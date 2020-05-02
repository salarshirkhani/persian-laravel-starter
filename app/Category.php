<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string $type
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $children
 * @property-read int|null $children_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Company[] $companies
 * @property-read int|null $companies_count
 * @property-read \App\Category|null $parent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'description', 'type'];

    public function companies() {
        if (!empty($this->type) && $this->type != 'company')
            throw new \LogicException("This category type doesn't support companies.");

        return $this->hasMany('App\Company', 'category_id');
    }

    public function parent() {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function children() {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function childrenHierarchy() {
        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'children' => []
        ];
        $this->load('children');
        /** @var Category $child */
        foreach ($this->children as $child) {
            $data['children'][$child->id] = $child->childrenHierarchy();
        }
        return $data;
    }

    public static function hierarchy($type = null) {
        $roots = self::whereNull('parent_id');
        if ($type != null)
            $roots = $roots->where('type', $type);
        $roots = $roots->with('children')->get();

        $hierarchy = [];
        /** @var Category $category */
        foreach ($roots as $category) {
            $hierarchy[$category->id] = $category->childrenHierarchy();
        }
        return $hierarchy;
    }
}
