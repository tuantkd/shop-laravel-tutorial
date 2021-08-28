<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory;
    protected $table = 'group_users';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'group_user_name'];

    //Nhóm người dùng có nhiều sự cho phép truy cập
    public function Permission()
    {
        return $this->hasMany(Permission::class);
    }

    //Nhóm người dùng có nhiều người dùng
    public function User()
    {
        return $this->hasMany(User::class);
    }
}
