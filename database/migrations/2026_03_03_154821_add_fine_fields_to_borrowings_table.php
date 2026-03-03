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
        Schema::table('borrowings', function (Blueprint $table) {
            $table->datetime('returned_at')->nullable()->after('status');
            $table->decimal('fine_amount', 10, 2)->default(0)->after('returned_at');
            $table->text('notes')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('borrowings', function (Blueprint $table) {
            $table->dropColumn(['returned_at', 'fine_amount']);
            $table->text('notes')->nullable(false)->change();
        });
    }
};
