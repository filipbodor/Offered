<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_user_id');
            $table->unsignedBigInteger('to_user_id');
            $table->unsignedBigInteger('advertisement_id')->nullable();
            $table->text('content');
            $table->timestamps();

            // Define foreign key constraints if needed
            $table->foreign('from_user_id')->references('id')->on('users');
            $table->foreign('to_user_id')->references('id')->on('users');
            $table->foreign('advertisement_id')->references('id')->on('advertisements')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}

