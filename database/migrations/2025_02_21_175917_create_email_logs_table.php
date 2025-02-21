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
        Schema::create('email_logs', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->text('email_cc')->nullable();
            $table->string('subject');
            $table->text('msg');
            $table->timestamp('time')->useCurrent();
            $table->string('type', 20);
            $table->longText('attachments')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->integer('sent_status')->default(0);
            $table->integer('send_attempts')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_logs');
    }
};
