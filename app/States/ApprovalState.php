<?php


namespace App\States;


class ApprovalState
{
    public $status = 'created';

    public function events()
    {
        $a = [
            [   // 撤销审批
                'name' => 'cancel',
                'src' => ['waiting'],
                'dst' => 'closed'
            ],
            [   // 审批通过
                'name' => 'pass',
                'src' => ['created'],
                'dst' => 'closed'
            ],
            [   // 审批拒绝
                'name' => 'reject',
                'src' => ['created'],
                'dst' => 'closed'
            ],
        ];
    }
}
