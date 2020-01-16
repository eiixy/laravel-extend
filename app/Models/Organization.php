<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    //

    public function users()
    {
        return $this->belongsToMany(User::class)->using(UserOrganization::class);
    }
}
