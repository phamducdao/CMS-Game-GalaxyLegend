<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Searchable;


class allgiftcode extends Model
{   
    use Searchable;
    protected $table = 'allgiftcode';
    public $timestamps = false;
    public function scopebyIsuse($query)
    {
        if (request()->has('isuse')) {
            $query->where('isuse', request()->isuse);
        }
    }
    public function setGiftcodeAttribute($value)
    {
        $this->attributes['giftcode'] = strtoupper($value);
    }
}
