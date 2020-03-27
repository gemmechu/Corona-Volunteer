<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunityLanguageRequirmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity_language_requirment', function (Blueprint $table) {
            $table->uuid('id'); 
            $table->uuid('opportunity_id');
            $table->string('language_name');
            $table->string('needed_proficency_level');
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
        Schema::dropIfExists('opportunity_language_requirment');
    }
}
