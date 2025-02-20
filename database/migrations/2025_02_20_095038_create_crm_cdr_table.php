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
        Schema::create('crm_cdr', function (Blueprint $table) {
            $table->id();
            $table->dateTime('calldate');
            $table->string('dcontext', 80);
            $table->string('src', 80);
            $table->string('dst', 80);
            $table->integer('duration');
            $table->string('disposition', 45);
            $table->string('uniqueid', 32)->unique();
            $table->string('org', 40);
            $table->string('cnum', 40);
            $table->string('cnam', 40);
            $table->string('recordingfile', 255);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crm_cdr');
    }
};
