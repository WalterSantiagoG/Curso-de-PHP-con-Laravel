<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedAtIndexToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            //Ej $table->index('created_at', 'my_created_at_idx'); debe ir $table->dropIndex('my_created_at_idx');
            //convencion nombre de la tabla, nombre de las columnas y la palabra index, pero si en la funcion up se escribe como segundo parametro en la funcion index el nombre del indes, aca en el down debe ir el mismo
            $table->dropIndex('messages_created_at_index');
        });
    }
}
