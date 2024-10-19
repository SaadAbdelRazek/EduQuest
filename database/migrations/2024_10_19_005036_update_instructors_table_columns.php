<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInstructorsTableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructors', function (Blueprint $table) {
            // Change columns to set default values to null
            $table->string('phone')->nullable()->default(null)->change();
            $table->string('specialization')->nullable()->default(null)->change();
            $table->decimal('rating', 3, 2)->nullable()->default(null)->change(); // Adjust precision if needed
            $table->text('bio')->nullable()->default(null)->change();
            $table->string('university_name')->nullable()->default(null)->change();
            $table->integer('experience_years')->nullable()->default(null)->change();
            $table->string('academic_degree')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {


    }
}
