<?php

namespace App\Http\Controllers\Approval;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ApprovalRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    private $approvalRepository;
    public function __construct(ApprovalRepositoryInterface $approvalRepository)
    {
        $this->approvalRepository = $approvalRepository;

    }

    //
    public function created()
    {
        $approval = $this->validate([
            'type' => 'exists:approvals_types,name',
            'form_data' => 'array',
        ]);
        $approval['user_id'] = Auth::id();

        $result = $this->approvalRepository->create($approval);

    }
}
