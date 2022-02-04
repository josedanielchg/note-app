<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
     /**
      * Run the migrations.
      *
      * @return void
      */
     public function up()
     {
          Schema::create('notes', function (Blueprint $table) {
               $table->id();
               $table->string("title");
               $table->string('slug');
               $table->text("body");
               $table->string('abstract');
               $table->boolean("delete")->default("0");
               $table->unsignedBigInteger("background_id")->nullable();
               $table->unsignedBigInteger("user_id");

               $table->foreign("background_id")
                    ->references("id")
                    ->on("backgrounds")
                    ->onUpdate("cascade")
                    ->onDelete("set null");

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
          Schema::dropIfExists('notes');
     }
}
