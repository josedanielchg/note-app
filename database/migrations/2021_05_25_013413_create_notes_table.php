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
               $table->text("body");
               $table->boolean("delete");
               $table->unsignedBigInteger("background_id")->nullable();

               $table->foreign("background_id")
                    ->references("id")
                    ->on("backgrounds")
                    ->onUpdate("cascade")
                    ->onDelete("set null");

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
