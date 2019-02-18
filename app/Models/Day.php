<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Day extends Model
{
    use CrudTrait;
    use Sluggable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'days';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['git_link' ,'slug', 'body', 'title', 'short_description', 'meta_description', 'meta_keywords', 'user_id'];
    // protected $hidden = [];
    // protected $dates = [];
    // protected $casts = [
    //     'script'  => 'array',
    //     'style' => 'array',
    // ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
    }


        // The slug is created automatically from the "title" field if no slug exists.
    public function getSlugOrTitleAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->title;
    }

    public function view(int $amount = 1)
    {
        $this->timestamps = false;
        $this->views += $amount;
        $this->save();
        $this->timestamps = true;

        return $this;
    }

}