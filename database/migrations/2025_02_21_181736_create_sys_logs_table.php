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
        Schema::create('sys_log', function (Blueprint $table) {
            $table->id();
            $table->timestamp('log_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('log_user', 100);
            $table->string('log_title', 100);
            $table->text('log_msg');
            $table->string('log_host', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sys_log');
    }
};
