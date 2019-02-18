<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Illuminate\Notifications\Notifiable;

class menu_item extends Model
{
    use CrudTrait;
    use Notifiable;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'menu_items';
    protected $primaryKey = 'id';
    public $timestamps = true;
}
