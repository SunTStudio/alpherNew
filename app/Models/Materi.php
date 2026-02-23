<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $guarded = ['id'];

    // relasi
    public function subMateri()
    {
        return $this->hasMany(SubMateri::class);
    }
}
