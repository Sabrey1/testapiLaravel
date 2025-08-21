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
    $table->id('invoiceid');
    $table->boolean('ishidden')->default(0);
    $table->foreignId('customerid')->constrained('customers', 'customerid'); // correct FK
    $table->date('orderdate');
    $table->decimal('vat', 8, 2)->default(0);
    $table->string('memo', 500)->nullable();
    $table->boolean('ispaid')->default(0);
    $table->timestamps();
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
