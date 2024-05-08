<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paiement extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant_total',
        'montant_ht',
        'Mode_de_paiement',
        'paiment_etat',
        'date_paiement',
        'client_id'
    ];
    protected $primaryKey = 'id_paiement';
    public function client(){
        return $this->belongsTo('App\Models\client','client_id');

    }

}
