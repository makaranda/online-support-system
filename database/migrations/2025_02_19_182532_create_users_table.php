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
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->foreignId('branch_id')->constrained('branches','id');
            $table->foreignId('usertype_id')->constrained('usertypes','id');
            $table->string('full_name');
            $table->string('email');
            $table->string('cell_phone','25')->nullable();
            $table->string('access_tpno','25')->nullable();
            $table->string('extension')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamp('registered_at')->useCurrent();
            $table->dateTime('last_login_at')->nullable();
            $table->tinyInteger('user_alert')->default(0);
            $table->tinyInteger('new_ticket_alert')->default(0);
            $table->tinyInteger('ticket_response_alert')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
