<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');            
            $table->uuid('contact_id');
            $table->string('status');
            $table->date('start_date');
            $table->date('end_date');
            $table->uuid('activity_type');
            $table->string('brief_description');
            $table->string('requirment_description');
            $table->integer('minimum_age');
            $table->uuid('organization_id');
            $table->integer('number_of_volunteer_needed');
            $table->integer('number_of_avaliable_spot');
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
        Schema::dropIfExists('opportunity');
    }
}
