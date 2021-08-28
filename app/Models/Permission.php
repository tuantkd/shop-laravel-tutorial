<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'group_user_id', 'permission_url', 'permission_name', 'permission_icon'];

    //Sự cho phép truy cập thuộc vào nhóm người dùng nào
    public function GroupUser()
    {
        return $this->belongsTo(GroupUser::class);
    }

    //Sự cho phép truy cập có nhiều con của nó
    public function PermissionChild()
    {
        return $this->belongsTo(PermissionChild::class);
    }
}
