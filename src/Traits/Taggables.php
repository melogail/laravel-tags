<?php
/**
 * Author: Mohamed Elogail
 * Email: moh.elogail@gmail.com
 * Version: 1.0.0
 * Licence: MIT
 * Description: Taggable trait will be used inside models of table needed to be tagged, the trait will carry all the
 *              logic needed for the package
 *
 * Date: 3/18/2020
 * Time: 3:38 PM
 */
namespace Melogail\LaravelTags;

use Melogail\LaravelTags\Models\Tag;

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
}