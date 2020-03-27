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
}