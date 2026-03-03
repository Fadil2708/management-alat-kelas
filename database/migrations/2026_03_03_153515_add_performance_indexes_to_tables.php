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
        Schema::table('tools', function (Blueprint $table) {
            $table->index('category_id');
            $table->index('status');
            $table->index('inventory_code');
        });

        Schema::table('borrowings', function (Blueprint $table) {
            $table->index('status');
            $table->index('user_id');
            $table->index('tool_id');
            $table->index('date');
            $table->index(['user_id', 'status']);
            $table->index(['tool_id', 'date']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->index('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tools', function (Blueprint $table) {
            $table->dropIndex(['category_id']);
            $table->dropIndex(['status']);
            $table->dropIndex(['inventory_code']);
        });

        Schema::table('borrowings', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['user_id']);
            $table->dropIndex(['tool_id']);
            $table->dropIndex(['date']);
            $table->dropIndex(['user_id', 'status']);
            $table->dropIndex(['tool_id', 'date']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role']);
        });
    }
};
