<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $guarded = ['id'];

        /**
        * Get the voucher uses for the voucher.
        */
        public function voucherUses()
        {
            return $this->hasMany(VoucherUse::class);
        }
}
