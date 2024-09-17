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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('status', ['pending', 'active', 'suspend', 'block', 'unregistered'])->default('pending');
            $table->foreignUuid('approved_by')->nullable()->constrained('users');
            $table->dateTime('approved_at')->nullable();
            $table->dateTime('last_login_at')->nullable();
            $table->boolean('is_admin')->default(0);
            $table->boolean('subscription')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
