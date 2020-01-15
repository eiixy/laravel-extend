<?php


namespace App\Repositories;

use App\Models\Approval;
use App\Repositories\Interfaces\ApprovalRepositoryInterface;

class ApprovalRepository implements ApprovalRepositoryInterface
{
    public function create($approval)
    {
        $model = Approval::query()->create($approval);
        dd($approval,$model->approvalType,$model);
        return Approval::query()->create($approval);
    }
}
