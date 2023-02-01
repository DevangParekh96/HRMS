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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('emp_id')->unsigned();
            $table->string('id1')->nullable();;
            $table->string('id2')->nullable();;
            $table->string('id3')->nullable();;
            $table->string('id4')->nullable();;
            $table->foreign('emp_id')->references('id')->on('employee')->onDelete('cascade');
            
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
        Schema::dropIfExists('documents');
    }
};
