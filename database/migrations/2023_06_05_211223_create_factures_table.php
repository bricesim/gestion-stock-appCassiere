<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->string('num_facture');
            $table->string('nom_produit1');
            $table->string('nom_produit2');
            $table->string('nom_produit3');
            $table->string('nom_produit4');
            $table->string('nom_produit5');
            $table->string('nom_produit6');
            $table->string('nom_produit7');
            $table->string('prixU_produit1');
            $table->string('prixU_produit2');
            $table->string('prixU_produit3');
            $table->string('prixU_produit4');
            $table->string('prixU_produit5');
            $table->string('prixU_produit6');
            $table->string('prixU_produit7');
            $table->string('qté_produit1');
            $table->string('qté_produit2');
            $table->string('qté_produit3');
            $table->string('qté_produit4');
            $table->string('qté_produit5');
            $table->string('qté_produit6');
            $table->string('qté_produit7');
            $table->string('prixT_produit1');
            $table->string('prixT_produit2');
            $table->string('prixT_produit3');
            $table->string('prixT_produit4');
            $table->string('prixT_produit5');
            $table->string('prixT_produit6');
            $table->string('prixT_produit7');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
