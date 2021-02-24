<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string("name", 30);
        });

        Schema::create('animal_treatment', function (Blueprint $table) {
            $table->id();

            // create the animal id column and foreign key
            $table->foreignId("animal_id")
            ->constrained()
            ->onDelete("cascade");

            // create the treatment id column and foreign key
            $table->foreignId("treatment_id")
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
      // remove the pivot table first
      // otherwise all the treatment foreign key contraints would fail
      Schema::dropIfExists("animal_treatment");
    
      // then drop the treatmeant table
      Schema::dropIfExists("treatments");
    }
}
