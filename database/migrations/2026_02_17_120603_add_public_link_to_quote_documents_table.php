<?php

// database/migrations/xxxx_xx_xx_add_public_link_to_quote_documents_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('quote_documents', function (Blueprint $table) {
            $table->string('public_hash', 64)->nullable()->unique()->after('number');
            $table->boolean('public_enabled')->default(false)->after('public_hash');
            $table->timestamp('public_expires_at')->nullable()->after('public_enabled');

            $table->timestamp('sent_at')->nullable()->after('public_expires_at');
            $table->string('sent_to')->nullable()->after('sent_at');
        });
    }

    public function down(): void
    {
        Schema::table('quote_documents', function (Blueprint $table) {
            $table->dropColumn([
                'public_hash',
                'public_enabled',
                'public_expires_at',
                'sent_at',
                'sent_to',
            ]);
        });
    }
};