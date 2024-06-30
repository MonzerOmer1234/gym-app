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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('amount');
            $table->tinyInteger('fee_type');
            $table->tinyInteger('payment_type');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('created_by')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
