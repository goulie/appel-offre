<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouscriresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souscrires', function (Blueprint $table) {
            $table->id();
             $table->string('denomination');
            $table->string('statut_social');
            $table->string('representant');
            $table->string('fonct_representant');
            $table->string('point_focal');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->BigInteger('offre_id')->unsigned();
            $table->timestamps();
            $table->foreign('offre_id')->references('id')->on('offres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('souscrires');
    }
}
