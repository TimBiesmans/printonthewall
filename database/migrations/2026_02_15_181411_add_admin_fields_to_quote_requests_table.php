<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $table->text('admin_notes')->nullable()->after('message');
            $table->unsignedBigInteger('handled_by_user_id')->nullable()->after('status');
            $table->timestamp('handled_at')->nullable()->after('handled_by_user_id');

            $table->index('status');
            $table->index('handled_at');
        });
    }

    public function down(): void
    {
        Schema::table('quote_requests', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['handled_at']);
            $table->dropColumn(['admin_notes','handled_by_user_id','handled_at']);
        });
    }
};