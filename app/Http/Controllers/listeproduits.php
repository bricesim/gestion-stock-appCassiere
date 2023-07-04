<?php

namespace App\Http\Controllers;


use App\Models\liste_produit;
use App\Models\facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Termwind\Components\Li;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

use function PHPUnit\Framework\returnSelf;

class listeproduits extends Controller
{

    public function nosProduits()
    {
       // $produit= liste_produit::all();
        $produit = DB::table('liste_produits')->get();

        // return json
        return response () ->json ([
            'produit' => $produit
        ],200);
    }


    // decrementation de la quantite de stock dans la bd
    public function decrementationBD ( Request $request){
        $sum [0]=0;
        $prixT = 0;
        $prixU = array();
        $prixUT = array();

        //genere automatiquement le numero de facture
        $caractereTotal ='0123456789AZERTYUIOPQSDFGHJKLMWXCVBNazertyuiop';
        $caractereTotalTaille = strlen($caractereTotal);
        $num_facture = '';

        for($i = 0; $i < 10; $i++){
            $num_facture = $caractereTotal[random_int(0, $caractereTotalTaille - 1)];
        }


     $produitBD = DB::table('liste_produits')->get(); 
       foreach($_GET['listes'] as $prod  ){
        $produit[] =  $prod;
       }
       foreach($_GET['quantiter'] as $quant  ){
        $quantity[] =  $quant;
       }


       foreach($produitBD as $prodBD  ){
        for ($i=0; $i < count($produit) ; $i++) {

            if((strcmp($prodBD->name,$produit[$i] )== 0 ) ) {
                $qteBD = $prodBD->qté;
                $qterestant = $qteBD -  $quantity[$i];
                DB::table('liste_produits')->where('name',$produit[$i])->update(array('qté'=>$qterestant ));

            }

        }
        for ($i = 0; $i < count($produit); $i++){
            if((strcmp($prodBD->name,$produit[$i] )== 0 ) ) {
                $price = $prodBD->prix;
                $prixU[$i]= $price;

                $prixUT[$i] = $quantity[$i]*$prixU[$i];
                 $prixT  += $prixUT[$i] ;

            }
        }

       }
        for ($i = count($produit ) ; $i < 7; $i++) {
                $produit[$i] = null;
            }

            for ($i = count($quantity) ; $i < 7; $i++) {
                $quantity[$i]= null;
            }
            for ($i = count($prixU) ; $i <= 7; $i++) {
                $prixU[$i]= null;
            }
            for ($i = count($prixUT); $i < 7; $i++) {
                $prixUT[$i]= null;
            }

            //ajoute les element dans la BD

                facture :: create ([
                'num_facture'=> $num_facture,
                'nom_produit1'=>$produit[0],

                'nom_produit2'=>$produit[1],
                'nom_produit3'=>$produit[2],
                'nom_produit4'=>$produit[3],
                'nom_produit5'=>$produit[4],
                'nom_produit6'=>$produit[5],
                'nom_produit7'=>$produit[6],

                'prixU_produit1'=>$prixU[0],
                'prixU_produit2'=>$prixU[1],
                'prixU_produit3'=>$prixU[2],
                'prixU_produit4'=>$prixU[3],
                'prixU_produit5'=>$prixU[4],
                'prixU_produit6'=>$prixU[5],
                'prixU_produit7'=>$prixU[6],

                'qté_produit1'=>$quantity[0],
                'qté_produit2'=>$quantity[1],
                'qté_produit3'=>$quantity[2],
                'qté_produit4'=>$quantity[3],
                'qté_produit5'=>$quantity[4],
                'qté_produit6'=>$quantity[5],
                'qté_produit7'=>$quantity[6],

                'prixT_produit1'=>$prixUT[0],
                'prixT_produit2'=>$prixUT[1],
                'prixT_produit3'=>$prixUT[2],
                'prixT_produit4'=>$prixUT[3],
                'prixT_produit5'=>$prixUT[4],
                'prixT_produit6'=>$prixUT[5],
                'prixT_produit7'=>$prixUT[6],
                'prixTotal' => $prixT,

            ]);

            $facture  = DB :: table('factures')->latest()->first();

            return response () ->json ([
                'affichefacture', compact('facture')
            ],200);

    }



    public function telechargerFacture(facture $facture){
        $facture  = DB :: table('factures')->latest()->first();
        $data = ['facture'=> $facture];

        $pdf = Pdf :: loadView('affichefacture', $data);

        $todaydate = Carbon:: now()->format('d-m-y');
        return $pdf->download('facture-'.$facture->num_facture.'-'.$todaydate.'.pdf');

    }



}
