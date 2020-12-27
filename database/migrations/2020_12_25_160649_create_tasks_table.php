<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    
    public function up()
    {
        if (!Schema::hasTable('tasks')) {
            Schema::create('tasks', function (Blueprint $table) {
                $table->id('id_task');
                $table->string('name_task', 40);
                $table->string('description_task', 150);
                $table->integer('status_task');
                $table->integer('service_task')->nullable();
                $table->integer('client_task')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
