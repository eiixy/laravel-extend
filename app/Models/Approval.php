<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    //
    protected $table = 'approvals';

    public function approvalType()
    {
        return $this->hasOne(ApprovalType::class);
    }

}
