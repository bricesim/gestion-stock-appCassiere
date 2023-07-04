<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facture extends Model
{
    use HasFactory;
    protected $fillable =[
        'num_facture',

        'nom_produit1',
        'nom_produit2',
        'nom_produit3',
        'nom_produit4',
        'nom_produit5',
        'nom_produit6',
        'nom_produit7',
        'prixU_produit1',
        'prixU_produit2',
        'prixU_produit3',
        'prixU_produit4',
        'prixU_produit5',
        'prixU_produit6',
        'prixU_produit7',
        'qté_produit1',
        'qté_produit2',
        'qté_produit3',
        'qté_produit4',
        'qté_produit5',
        'qté_produit6',
        'qté_produit7',
        'prixT_produit1',
        'prixT_produit2',
        'prixT_produit3',
        'prixT_produit4',
        'prixT_produit5',
        'prixT_produit6',
        'prixT_produit7',
        'prixTotal',
    ];
}
