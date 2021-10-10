<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
      'apartment_id',
      'date',
      'paid_at',
      'method',
      'reference',
      'amount',
    ];

    public function apartment(){
      return $this->belongsTo('App\Models\Apartment');
    }

    public function due(){
      return $this->belongsTo('App\Models\Due');
    }
}
