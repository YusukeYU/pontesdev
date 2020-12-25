<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('movimentations')) {
            Schema::create('movimentations', function (Blueprint $table) {
                $table->id('id_movimentation');
                $table->integer('type_movimentation');
                $table->decimal('value_movimentation', 8, 2);
                $table->string('description_movimentation', 150)->nullable();
                $table->integer('id_task_movimentation')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentations');
    }
}
