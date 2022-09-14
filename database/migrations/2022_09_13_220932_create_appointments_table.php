<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('hrn');
            $table->string('chief_complaint');
            $table->string('appointment_type');
            $table->date('appointment_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('ext_name');
            $table->date('date_of_birth');
            $table->string('sex');
            $table->string('contact_number');
            $table->string('social_media');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->integer('booked_by')->nullable()->default(0);
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
        Schema::dropIfExists('appointments');
    }
}
