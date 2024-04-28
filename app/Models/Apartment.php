<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $appends = ['paymentts'];

    protected $fillable = [
      'name',
      'floor'
    ];

    protected $hidden = [
      'created_at',
      'updated_at',
      'payments'
    ];

    public function payments(){
      return $this->hasMany('App\Models\Payment');
    }

    public function phones(){
      return $this->morphMany('App\Models\Phone', 'phoneable');
    }

    public function getPaymenttsAttribute(){
      return $this->payments->keyBy('date');
    }
}
