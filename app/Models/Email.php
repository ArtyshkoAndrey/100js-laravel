<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Notifications\Notifiable;

class Email extends Model
{
    use CrudTrait;
    use Notifiable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'emails';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['email'];
    // protected $hidden = [];
    // protected $dates = [];
    // protected $casts = [
    //     'script'  => 'array',
    //     'style' => 'array',
    // ];

}
