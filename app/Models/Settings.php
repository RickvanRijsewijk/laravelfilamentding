<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['site_name', 'site_logo', 'primary_color'];

    // Add the table name if it doesn't follow Laravel's naming convention
    protected $table = 'settings';
}
