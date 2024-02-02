<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueLivre extends Model
{
    use HasFactory;
    protected $fillable = ['livre_id', 'user_id', 'message'];
}
