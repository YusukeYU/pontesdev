<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('clients')) {
            Schema::create('clients', function (Blueprint $table) {
                $table->id('id_client');
                $table->string('name_client', 40);
                $table->string('email_client', 50)->unique();
                $table->string('phone_client', 14);
                $table->string('cpf_client', 14)->unique();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
