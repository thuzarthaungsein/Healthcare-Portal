<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NursingMail extends Model
{
    public $fillable = ['count','furigana','postal','division','city','phone','mail','present','relation','ttname','sex','years','nursing','fect','desire','hope'];
}
