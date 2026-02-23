<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AksesMateri extends Model
{
    protected $guarded = ['id'];

        public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
    public function voucherUse()
    {
        return $this->belongsTo(VoucherUse::class);
    }
    
}
