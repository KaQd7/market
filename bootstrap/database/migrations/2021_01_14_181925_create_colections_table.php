<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColectionsTable extends Migration
{
    
    public function up()
    {
        Schema::dropIfExists('colections');
        Schema::create('colections', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_coleccion')->nullable();
            $table->string('simbolo');
            $table->string('fecha');
            
            $table->timestamps();
        });
        Schema::table('cards',function(Blueprint $table){
            $table->foreignId('colections_id')->nullable()->constrained();
        });
    }

    public function down()
    {
        Schema::table('cards', function (Blueprint $table){
            $table->dropForeign(['colections_id']);
            $table->dropColumn('colections_id');
        });
        Schema::dropIfExists('colections');
    }
}
