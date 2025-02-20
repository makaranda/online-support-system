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
        Schema::create('ticket_responses', function (Blueprint $table) {

            $table->id();
            $table->foreignId('ticket_id')->nullable()->constrained('tickets')->onDelete('cascade');
            $table->string('ticket_no', 20)->nullable();
            $table->timestamp('date')->useCurrent();
            $table->text('response');
            $table->tinyInteger('hidden');
            $table->foreignId('added_user')->nullable()->comment('added_user null means ticket added through web')->constrained('users')->onDelete('set null');
            $table->string('source', 100)->nullable();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null');
            $table->string('asteriskid', 50)->nullable();
            $table->double('latitude')->default(0);
            $table->double('longitude')->default(0);
            $table->foreignId('ticket_status_id')->constrained('ticket_statuses')->onDelete('cascade');
            $table->tinyInteger('is_first')->default(0);
            $table->string('device', 25)->default('pc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_responses');
    }
};
