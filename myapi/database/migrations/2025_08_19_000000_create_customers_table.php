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
    Schema::disableForeignKeyConstraints();

    Schema::create('customers', function (Blueprint $table) {
        $table->id('customerid');
        $table->string('customername', 50);
        $table->string('companyname', 50)->nullable();
        $table->string('phone', 50)->nullable();
        $table->string('email', 50)->nullable();
        $table->string('address', 500)->nullable();
        $table->boolean('ishidden')->default(0);
        $table->boolean('isdefault')->default(0);
        $table->timestamps();
    });

    Schema::enableForeignKeyConstraints();
}
};