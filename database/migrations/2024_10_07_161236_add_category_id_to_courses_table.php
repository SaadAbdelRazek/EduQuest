<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            // Check if the 'category_id' column doesn't already exist before adding it
            // if (!Schema::hasColumn('courses', 'category_id')) {
            //     $table->unsignedBigInteger('category_id')->nullable()->after('id');
            //     $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // }
            $table->foreignId('category_id')->after('id')->constrained()->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            // $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
