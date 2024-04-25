<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharitiesTable extends Migration
{
    public function up()
    {
        Schema::create('charities', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing ID column
            $table->string('charity_legal_name'); // Creates a string column for the charity's legal name
            $table->text('full_address'); // Creates a text column for the full address
            $table->string('charity_website')->nullable(); // Creates a nullable string column for the website
            $table->string('service_type'); // Creates a string column for the type of service
            $table->timestamps(); // Creates created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('charities');
    }
};
