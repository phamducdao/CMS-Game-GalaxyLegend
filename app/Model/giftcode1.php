<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class giftcode1 extends Model
{
    //
    protected $table = 'giftcode';
    public $timestamps = false;
    protected $appends = ['rewards'];
    public function getrewardsAttribute()
    {
        $reward_ids = [];
        $reward_arr = explode(';',$this->attributes['reward']);
       // dd($reward_arr);
        foreach ($reward_arr as $value) {
            $reward_arr_child = explode(',', $value);
            
            foreach ($reward_arr_child as $value) {
                $reward_ids[] = $value;
            }
        }
        //dd($reward_ids);
        $rewards = reward::whereIn('id', $reward_ids)->get();
        return $rewards;
    }
}
