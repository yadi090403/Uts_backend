<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
     # menambahkan property fillable
     protected $fillable = ['nama', 'no', 'alamat', 'setatus','in_date_at','out_date_at'];
}
