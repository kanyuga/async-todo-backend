<?php
/**
 * Created by PhpStorm.
 * User: topher
 * Date: 29/09/2017
 * Time: 23:22
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todo';

    protected $fillable = ['title', 'completed'];

}