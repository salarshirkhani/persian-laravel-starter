<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Keyword
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Company[] $companies
 * @property-read int|null $companies_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Service[] $services
 * @property-read int|null $services_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Keyword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Keyword newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Keyword query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Keyword whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Keyword whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Keyword whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Keyword whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Keyword whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Keyword extends Model
{
    protected $table = 'keywords';

    protected $fillable = ['name', 'type'];

    public function companies() {
        if (!empty($this->type) && $this->type != 'company')
            throw new \LogicException("This keyword type doesn't support companies.");

        return $this->belongsToMany('App\Company', 'company_keyword_relation', 'keyword_id', 'company_id')->withTimestamps();
    }

    public function products() {
        if (!empty($this->type) && $this->type != 'product')
            throw new \LogicException("This category type doesn't support products.");
        return $this->belongsToMany('App\Product', 'product_keyword_relation', 'keyword_id', 'product_id')->withTimestamps();
    }

    public function services() {
        if (!empty($this->type) && $this->type != 'service')
            throw new \LogicException("This category type doesn't support services.");
        return $this->belongsToMany('App\Service', 'service_keyword_relation', 'keyword_id', 'service_id')->withTimestamps();
    }

    public static function syncKeywords(array $names, $type) {
        $existing_keywords = self::whereIn('name', $names)->where('type', $type)->get();
        $new_keywords = $names;
        foreach ($existing_keywords as $keyword) {
            unset($new_keywords[array_search($keyword->name, $new_keywords)]);
        }

        $rows = [];
        $now = Carbon::now();
        foreach ($new_keywords as $name) {
            $rows[] = [
                'name' => $name,
                'type' => $type,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        self::insert($rows);

        return self::whereIn('name', $names)->where('type', $type)->get();
    }
}
