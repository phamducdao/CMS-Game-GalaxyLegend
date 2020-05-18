<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class rankingcampreward extends Model
{
    //
    protected $table = 'rankingcampreward';
    public $timestamps = false;
    public function campain()
    {
        return $this->beLongsTo(campain::class,'campid');
    }
    public function reward()
    {
        return $this->beLongsTo(reward::class,'rewardid');
    }
}
