<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('size')->nullable();       // bv. "300 x 200 cm"
            $table->string('surface')->nullable();    // baksteen/beton/...
            $table->string('indoor_outdoor')->nullable(); // indoor/outdoor
            $table->string('timeline')->nullable();   // wanneer gewenst
            $table->text('message')->nullable();
            $table->string('reference_file_path')->nullable(); // upload
            $table->string('status')->default('new'); // new/handled/...
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};