<?php

// database/migrations/xxxx_xx_xx_create_quote_documents_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('quote_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_request_id')->constrained('quote_requests')->cascadeOnDelete();

            $table->string('number')->nullable()->unique(); // bv POTW-2026-0001
            $table->date('date')->nullable();
            $table->date('valid_until')->nullable();

            // snapshot klantgegevens (zodat offerte “vast” blijft)
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_location')->nullable();

            // instellingen
            $table->decimal('vat_rate', 5, 2)->default(21.00);   // %
            $table->decimal('discount', 10, 2)->default(0);      // bedrag
            $table->text('intro')->nullable();
            $table->text('notes')->nullable();
            $table->text('terms')->nullable();

            // totals (server-side opgeslagen)
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('vat_amount', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_documents');
    }
};