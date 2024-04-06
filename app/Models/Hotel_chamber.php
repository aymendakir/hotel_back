<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel_chamber extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'image',
        'prix',
        'beds_type',
        'beds_number',
        'baths_number',
        'id_chamber',
        'status'
    ];
    protected $primaryKey = 'id_chamber';
}
