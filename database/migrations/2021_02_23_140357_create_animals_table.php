<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("animals", function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
            $table->string("type", 50);
            $table->string("date_of_birth", 50);
            $table->float("weight");
            $table->float("height");
            $table->float("biteyness");
            $table->timestamps();
        
            // create the owner_id column
            // add a foreign key constraint
            // setup cascading on delete
            // this tells MySQL that the owner_id column
            // references the id column on the owners table
            // we also want MySQL to automatically remove any
            // animals linked to owners that are deleted
            $table->foreignId("owner_id")
                  ->constrained()
                  ->onDelete("cascade");
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
            
    }
}
