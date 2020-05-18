<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Searchable;
class mailbox extends Model
{
    //
    use Searchable;
    protected $table = 'mailbox';
    public $timestamps = false;
}
