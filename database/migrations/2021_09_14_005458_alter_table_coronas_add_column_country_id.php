<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableCoronasAddColumnCountryId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coronas', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->after('id');
            $table->foreign('country_id')->references('id')->on('pais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coronas', function (Blueprint $table) {
            // nometabela_nomecoluna_foreign
            $table->dropForeign('coronas_country_id_foreign');
            $table->dropColumn('country_id');
        });
    }
}
