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
        Schema::create('service_request', function (Blueprint $table) {
            $table->id();
            $table->foreignId("property_id")->constrained()->onDelete("cascade");
            $table->foreignId("service_id")->constrained()->onDelete("cascade");
            $table->enum("status", ["pending", "in-progress", "completed", "cancelled"])->default("pending");
            $table->date("scheduled_at")->nullable();
            $table->enum("payment_status", ["unpaid", "paid", "released","pending"])->default("unpaid");
            $table->text("notes")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_request');
    }
};
