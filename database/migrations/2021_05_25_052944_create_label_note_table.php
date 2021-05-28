<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelNoteTable extends Migration
{
     /**
      * Run the migrations.
      *
      * @return void
      */
     public function up()
     {
          Schema::create('label_note', function (Blueprint $table) {
               $table->id();

               $table->unsignedBigInteger("note_id");
               $table->unsignedBigInteger("label_id");

               $table->foreign("note_id")->references("id")->on("notes")->onDelete("cascade")->onUpdate("cascade");
               $table->foreign("label_id")->references("id")->on("labels")->onDelete("cascade")->onUpdate("cascade");

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
          Schema::dropIfExists('label_note');
     }
}
