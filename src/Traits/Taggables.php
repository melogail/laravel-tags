<?php
/**
 * Author: Mohamed Elogail
 * Email: moh.elogail@gmail.com
 * Version: 1.0.2
 * Licence: MIT
 * Description: Taggable trait will be used inside models of table needed to be tagged, the trait will carry all the
 *              logic needed for the package
 *
 * Date: 3/18/2020
 * Time: 3:38 PM
 */
namespace Melogail\LaravelTags\Traits;

use Melogail\LaravelTags\Models\Tag;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


trait Taggables
{
    /**
     * Return taggable entity
     *
     * @return mixed
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Sync tags in database to avoid redundancy
     *
     * @param MorphToMany $query
     * @param array $tags
     * @return
     */
    public function saveTags(MorphToMany $query, array $tags)
    {
        $tagsIds = [];

        foreach ($tags as $tag) {
            $t = Tag::where('name', trim($tag))->first();

            if ($t) {
                array_push($tagsIds, $t->id);

            } else {    // create newly added tag and push it to the array
                $t = Tag::create(['name' => trim($tag), 'slug' => strtolower(str_replace(' ', '-', trim($tag)))]);
                array_push($tagsIds, $t->id);

            }
        }

        return $query->sync($tagsIds);
    }
}