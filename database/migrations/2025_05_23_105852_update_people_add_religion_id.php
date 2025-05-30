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
                $table->unsignedBigInteger('religion_id')->nullable()->after('gender_id');
                $table->foreign('religion_id')->references('id')->on('religions');
                $table->dropColumn('religion'); // Optional: remove old column
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
