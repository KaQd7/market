<<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    
    public function up()
    {
        Schema::create ('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_venta')->unique();
            $table->string('cantidad');
            $table->string('precio');
            $table->timestamps();
            $table->foreignId('cards_id')->nullable()->constrained();

        });
        
    }

   
    public function down()
    {
        $table->dropForeign(['cards_id']);
        $table->dropColumn('cards_id');
        
        Schema::dropIfExists('ventas');
    }
}