<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipsTable extends Migration
{
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->boolean('for_international_students');
            $table->text('description');
            $table->string('gender');
            $table->string('provider');
            $table->string('level_of_study');
            $table->boolean('for_australian_students');
            $table->string('title');
            $table->string('more_information_url');
            $table->string('field_of_study');
            $table->string('frequency');
            $table->integer('number_per_year')->nullable();
            $table->string('student_type');
            $table->text('eligibility');
            $table->string('duration');
            $table->string('closing_date');
            $table->decimal('amount', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('scholarships');
    }
}
