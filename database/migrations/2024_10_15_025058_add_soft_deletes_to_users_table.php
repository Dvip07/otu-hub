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
        Schema::table('users', function (Blueprint $table) {
            $table->string('display_name')->unique()->after('name'); // Add unique display_name column after name
            $table->string('avatar')->nullable()->after('password'); // Add avatar column after password
            $table->softDeletes(); // Add soft delete column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['avatar']); // Remove the columns
            $table->dropUnique(['display_name']); // Remove unique constraint
            $table->dropColumn('display_name'); // Remove the column
        });
    }
};
