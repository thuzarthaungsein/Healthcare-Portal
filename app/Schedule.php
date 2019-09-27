<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $fillable = ['customer_id','mon','tue','wed','thu','fri','sat','sun','part'];
}
