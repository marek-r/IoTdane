<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 * Model
 * @package App
 */
class Log extends Model
{
    protected $fillable = [
        'Light',
        'Temp',
        'Hum'
    ];
}

