<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;
use Spatie\Permission\Models\Permission as PermissionModel;
use App\Models\Config\Module;

class Permission extends PermissionModel
{

    public function module()
    {
        return $this->belongsTo('App\Models\Config\Module', 'module_id');
    }
}
