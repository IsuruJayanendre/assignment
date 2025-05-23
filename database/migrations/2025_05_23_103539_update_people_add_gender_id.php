<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('people', function (Blueprint $table) {
                $table->unsignedBigInteger('gender_id')->nullable()->after('dob');
                $table->foreign('gender_id')->references('id')->on('genders');
                $table->dropColumn('gender'); // Optional: remove old column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
