<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chambre extends Model
{
    use HasFactory;
    protected $fillable=[
        'price',
        'image',
        'Chambre_etat',
        'type'

    ];
    protected $primaryKey = 'id_chambre';
    public $timestamps = false;
}
