<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelsTable extends Migration
{
     /**
      * Run the migrations.
      *
      * @return void
      */
     public function up()
     {
          Schema::create('labels', function (Blueprint $table) {
               $table->id();

               $table->string("name", 65);
               $table->unsignedBigInteger("user_id");

               $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");

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
          Schema::dropIfExists('labels');
     }
}
