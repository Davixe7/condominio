<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
      'dni',
      'gender',
      'name',
      'birthdate',
      'email',
      'apartment_id'
    ];

    public function apartment(){
      return $this->belongsTo('App\Models\Apartment');
    }
}
