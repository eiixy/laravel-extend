<?php


namespace App\Repositories\Interfaces;


interface ApprovalRepositoryInterface
{
    /**
     * 创建审批
     * @param $approval
     * @return mixed
     */
    public function create($approval);



}
