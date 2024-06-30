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

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            
            $table->string('name' , 50);
            $table->string('mobile' , 11)->unique();
            $table->tinyInteger('gender');
            $table->enum('blood_group' , ['A+' , 'A-' , 'AB+' , 'AB-' , 'B+' , 'B-' , 'O+' , 'O-']);
            $table->text('address');
            $table->string('photo' , 100);
            $table->tinyInteger('lock')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('card_no' , 15)->default('0000000000');
            $table->unsignedBigInteger('created_by');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
