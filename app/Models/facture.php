<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class facture extends Model
{
    use HasFactory;
    protected $fillable=[
        "montant_ht",
        "montant_total",
        "paiement_id",
        "client_id"
    ];
    protected $primaryKey = 'id_facture';


}
