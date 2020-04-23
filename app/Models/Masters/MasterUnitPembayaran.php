<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Model;

class MasterUnitPembayaran extends Model
{
    public function vocher()
    {
        return $this->belongsTo('App\Models\Masters\GroupPembayaran', 'kodegroup');
    }
}
