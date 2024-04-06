<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
     protected $fillable=[
                              'date_entree',
                              'date_sortie',
                              'nb_adultes',
                              'nb_enfants',
                              'nb_nuits',
                              'etat_reservation',
                              'client_id',
                              'chambre_id',
                              'paiement_id',

        ];
        protected $primaryKey = 'id_reservation';
        public $timestamps = false;
}
