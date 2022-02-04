<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
     /**
      * Run the migrations.
      *
      * @return void
      */
     public function up()
     {
          Schema::create('images', function (Blueprint $table) {
               $table->id();

               $table->string("path");
               $table->unsignedBigInteger("user_id");

               $table->foreign("user_id")
                    ->references("id")
                    ->on("users")
                    ->onUpdate("cascade")
                    ->onDelete("cascade");

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
          Schema::dropIfExists('images');
     }
}
