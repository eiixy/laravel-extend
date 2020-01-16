<?php

use App\Models\User;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use Sczts\Skeleton\Traits\SeederTrait;
use Sczts\Skeleton\Traits\Random;

class UserOrganizationSeeder extends Seeder
{
    use SeederTrait, Random;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->createParentChild(Organization::query(), $this->data());
        User::all()->each(function ($user) {
            $organization_id = $this->randomId('organizations');
            \App\Models\UserOrganization::query()->create(['user_id' => $user->id, 'organization_id' => $organization_id]);
        });
    }

    private function data()
    {
        return [
            [
                'name' => '一级部门-1',
                'children' => [
                    [
                        'name' => '二级部门-1-1',
                    ],
                    [
                        'name' => '二级部门-1-2',
                    ],
                    [
                        'name' => '二级部门-1-3',
                    ]
                ]
            ],
            [
                'name' => '一级部门-2',
                'children' => [
                    [
                        'name' => '二级部门-2-1',
                    ],
                    [
                        'name' => '二级部门-2-2',
                    ],
                    [
                        'name' => '二级部门-2-3',
                    ]
                ]
            ]
        ];
    }
}
