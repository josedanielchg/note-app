<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteUserTable extends Migration
{
     /**
      * Run the migrations.
      *
      * @return void
      */
     public function up()
     {
          Schema::create('note_user', function (Blueprint $table) {
               $table->id();

               $table->unsignedBigInteger("user_id");
               $table->unsignedBigInteger("note_id");
               $table->unsignedBigInteger("role_id")->nullable();

               $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->onUpdate("cascade");
               $table->foreign("note_id")->references("id")->on("notes")->onDelete("cascade")->onUpdate("cascade");
               $table->foreign("role_id")->references("id")->on("roles")->onDelete("set null")->onUpdate("cascade");

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
          Schema::dropIfExists('note_user');
     }
}
