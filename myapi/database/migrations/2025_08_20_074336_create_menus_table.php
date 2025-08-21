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
        Schema::create('menus', function (Blueprint $table) {
    $table->id('menuid');
    $table->boolean('ishidden')->default(0);
    $table->foreignId('menutypeid')->constrained('menu_types', 'menutypeid'); // correct FK
    $table->string('menuname', 50);
    $table->string('itemdescription', 500)->nullable();
    $table->decimal('saleprice', 10, 2);
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
