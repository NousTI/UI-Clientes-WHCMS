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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('type'); // vps, dedicado, compartido
            $table->string('status'); // active, suspended
            $table->string('location');
            $table->string('ip_address');
            $table->decimal('price', 10, 2);
            $table->string('billing_cycle'); // mes, año
            $table->decimal('uptime', 5, 2)->default(99.99);
            $table->integer('cpu_usage')->default(0);
            $table->date('expires_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
