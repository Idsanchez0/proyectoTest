<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsAereosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets_aereos', function (Blueprint $table) {
            $table->id();

            $table->string('destination',100);
            $table->string('airline',100);
            $table->decimal('price', 8, 2);
            $table->integer('stopover_number');
            $table->timestamp('departure');
            $table->timestamp('arrival');
            $table->string('duration');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets_aereos');
    }
}
