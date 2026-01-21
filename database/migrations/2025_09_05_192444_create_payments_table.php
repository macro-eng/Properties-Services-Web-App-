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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId("contract_id")->constrained()->onDelete("cascade");
            $table->decimal("amount", 8, 2);
            $table->enum("method",["credit_card","bank_transfer","paypal","cash"])->default("credit_card");
            $table->enum("status", ["pending", "completed", "failed"])->default("pending");
            $table->date("paid_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
