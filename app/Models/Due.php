<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Due extends Model
{
    use HasFactory;

    protected $fillable = [
      'date',
      'amount'
    ];

    public function payments(){
      return $this->hasMany('App\Models\Payment');
    }
}