<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionChild extends Model
{
    use HasFactory;
    protected $table = 'permission_children';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'permission_id', 'permission_child_url', 'permission_child_name', 'permission_child_icon'];

    //Sự cho phép truy cập con thuộc cha Sự cho phép nào
    public function Permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
