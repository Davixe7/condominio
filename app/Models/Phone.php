<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
      'phone',
      'whatsapp',
      'phoneable_id',
      'phoneable_type',
    ];

    public function phoneable(){
      return $this->morphTo();
    }
    
}
