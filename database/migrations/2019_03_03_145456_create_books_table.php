<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('book_id')->unique();
            $table->string('book_image');
            $table->string('book_name');
            $table->string('book_author');
            $table->string('book_publisher');
            $table->string('book_year');
            $table->string('book_price');
            $table->date('book_date_added');
            $table->timestamps();
            $table->index(['book_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
