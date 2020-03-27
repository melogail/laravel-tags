<?php
/**
 * Author: Mohamed Elogail
 * Email: moh.elogail@gmail.com
 * Version: 1.0.0
 * Licence: MIT
 * Description: Tag model page
 *
 * Date: 3/18/2020
 * Time: 4:18 PM
 */

namespace Melogail\LaravelTags\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    /**
     * Targetd Table
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * Mass assignment fields
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Casting dates
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
    /**
     * Guarded fields from mass assignment check
     *
     * @var array
     */
    protected $guarded = ['id', 'create_at', 'updated_at'];

    /**
     * Sync tags in database to avoid redundancy
     *
     * @param $query
     * @param array $tags
     * @return
     */
    public function scopeSaveTags($query, array $tags)
    {
        $tagsIds = [];

        foreach ($tags as $tag) {
            $t = Tag::where('name', $tag)->first();

            if ($t) {
                array_push($tagsIds, $t->id);

            } else {    // create newly added tag and push it to the array
                $t = Tag::create(['name' => $tag]);
                array_push($tagsIds, $t->id);

            }
        }

        return $query->sync($tagsIds);
    }
}