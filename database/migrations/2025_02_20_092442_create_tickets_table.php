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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->timestamp('date')->useCurrent();
            $table->foreignId('customer_id')->nullable();
            $table->string('customer')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('wacc')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->text('email_cc')->nullable();
            $table->string('tel')->nullable();
            $table->string('cell')->nullable();

            $table->foreignId('service_branch')->constrained('branches','id');
            $table->foreignId('service_type')->nullable();

            $table->string('subject',100)->nullable();
            $table->string('priority',15)->nullable();
            $table->string('source',100)->nullable()->comment('web or user email');
            $table->string('call',100)->nullable();
            $table->string('inquiry_type',25)->nullable();
            $table->string('call_type',5)->nullable();
            $table->string('line',25)->nullable();
            $table->integer('duration')->nullable();
            $table->timestamp('call_time')->nullable();

            $table->foreignId('created_by')->nullable();
            $table->foreignId('assigned_by')->nullable();
            $table->foreignId('assigned_to')->nullable();

            $table->string('host')->nullable();
            $table->string('device')->default('pc');
            $table->tinyInteger('is_closed')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
