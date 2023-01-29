<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('marker_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('categories_id');
            $table->text('description');
            $table->string('status')->default('unresolved');
            $table->timestamps();
    
            $table->foreign('marker_id')->references('id')->on('markers');
            $table->foreign('user_id')->references('id')->on('users');
           

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};
