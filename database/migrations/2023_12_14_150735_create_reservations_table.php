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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
    $table->unsignedBigInteger('user_id');
    $table->unsignedBigInteger('table_id'); // Ganti 'table_number' menjadi 'table_id'
    $table->string('name');
    $table->string('phone');
    $table->date('date');    
    $table->string('payment_proof')->nullable();
    $table->text('note')->nullable();
    $table->enum('status', ['pending', 'waiting payment', 'approved', 'canceled']);
    $table->timestamp('payment_due_at')->nullable();
    $table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade'); // Relasikan dengan id pada tabel tables
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
