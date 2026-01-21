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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id")->constrained()->onDelete("cascade");
            $table->foreignId("property_id")->constrained()->onDelete("cascade");
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->string("pdf_file")->nullable();
            $table->boolean("signed")->default(false);
            $table->decimal("amount",8,2);
            $table->enum("status", ["active","cancelled", "expired", "terminated"])->default("active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
