<?php
/**
 * Created by PhpStorm.
 * User: evgesha
 * Date: 16.07.18
 * Time: 23:36
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table = 'domains';

    protected $fillable = [
        'name',
        'content_length',
        'body',
        'code_response',
        'header',
        'keywords',
        'description'
    ];
}
