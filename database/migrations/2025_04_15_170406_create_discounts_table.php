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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('discount_type');
            $table->integer('discount_value');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Add forign key constraint to menu_items table
        Schema::table('menu_items', function (Blueprint $table) {
            $table->foreignId('discount_id')->nullable()->constrained()->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->dropForeign(['discount_id']);
        });
        Schema::dropIfExists('discounts');
    }
};
