<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestJson extends Model
{
    //
    protected $table = 'test_json';
    protected $guarded = [];

    protected $casts = [
        'options' => 'array'
    ];
}
