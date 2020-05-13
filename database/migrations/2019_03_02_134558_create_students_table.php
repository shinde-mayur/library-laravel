<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stud_id')->unique();
            $table->string('stud_name');
            $table->string('stud_gender');
            $table->string('stud_class');
            $table->string('stud_contact');
            $table->string('stud_email')->unique();
            $table->string('stud_addr');
            $table->string('stud_city');
            $table->string('stud_pin');
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
        Schema::dropIfExists('students');
    }
}
