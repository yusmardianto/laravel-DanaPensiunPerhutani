<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;
use App\Models\Permission;

class Module extends Model
{
    protected $table = 'module';

    public function permissions()
    {
        return $this->hasMany('App\Models\Permission', 'module_id');
    }
}
