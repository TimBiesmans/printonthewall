<?php

// database/migrations/xxxx_xx_xx_create_quote_lines_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('quote_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_document_id')->constrained('quote_documents')->cascadeOnDelete();

            $table->string('title');                // bv "Print - logo receptie"
            $table->text('description')->nullable(); // extra info
            $table->decimal('qty', 10, 2)->default(1);
            $table->string('unit')->nullable();      // m², stuk, uur...
            $table->decimal('unit_price', 10, 2)->default(0);
            $table->decimal('line_total', 10, 2)->default(0);

            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_lines');
    }
};