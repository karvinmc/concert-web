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
    Schema::create('concerts', function (Blueprint $table) {
      $table->id();
      $table->foreignId('singer_id')->constrained('singers')->cascadeOnDelete();
      $table->string('name', 255);
      $table->text('description');
      $table->date('date');
      $table->time('time');
      $table->string('location', 255)->index();
      $table->decimal('default_price', 10, 2)->default(0);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('concerts');
  }
};
