<?php

namespace App\Models;

use Eiixy\Rbac\Traits\RbacUser;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable,RbacUser;

    const STATUS_NORMAL = 0;        // 正常
    const STATUS_FORBIDDEN = 1;     // 禁用

    const TYPE_ADMIN = 0;           // 管理员
    const TYPE_SUPER_ADMIN = 1;     // 超级管理员
    const TYPE_MEMBER = 2;          // 普通成员

    protected $table = 'users';
    protected $guarded = [];

    /**
     * 部门
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function department()
    {
        return $this->hasOneThrough(Organization::class,UserOrganization::class,'user_id','id','id','organization_id');
    }

    /**
     * 获取会储存到 jwt 声明中的标识
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * 返回包含要添加到 jwt 声明中的自定义键值对数组
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return ['role' => 'user'];
    }
}
