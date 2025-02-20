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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('title',10)->nullable();
            $table->string('first_name',225);
            $table->string('last_name',225)->nullable();
            $table->string('company_name',225)->nullable();

            $table->integer('cus_type')->nullable();
            $table->integer('busi_type')->nullable();

            $table->string('phy_add_1',225)->nullable();
            $table->string('phy_add_2',225)->nullable();
            $table->string('phy_add_3',225)->nullable();

            $table->string('post_add_1',225)->nullable();
            $table->string('post_add_2',225)->nullable();
            $table->string('post_add_3',225)->nullable();

            $table->string('area',100)->nullable();
            $table->string('city',50)->nullable();
            $table->text('site_details')->nullable();

            $table->string('tp1',50)->nullable();
            $table->string('tp2',50)->nullable();

            $table->string('fax1',50)->nullable();
            $table->string('fax2',50)->nullable();

            $table->string('email',225)->nullable();
            $table->string('btsName',50)->nullable();

            $table->string('kbilling_no',100)->nullable();
            $table->integer('con_type_id');
            $table->string('con_name',50)->nullable();

            $table->integer('productName')->nullable();
            $table->integer('branch_ID')->nullable();
            $table->integer('status')->default(1);
            $table->integer('email_status')->default(1);
            $table->integer('bulk_status')->default(0);
            $table->dateTime('last_email_sent_on')->nullable();
            $table->dateTime('addedDate')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
