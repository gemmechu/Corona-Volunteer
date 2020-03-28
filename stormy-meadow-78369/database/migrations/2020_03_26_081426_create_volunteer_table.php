<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('email');
            $table->uuid('contact_id');
            $table->string('password');
            $table->float('distance_willing_to_travel',8,2);
            $table->string('educational_level');
            $table->string('employment_status');
            $table->boolean('disability_status');
            $table->string('id_image');
            $table->string('account_status');
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
        Schema::dropIfExists('volunteer');
    }
}
