<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMateri extends Model
{
    protected $guarded = ['id'];
    //
    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}
