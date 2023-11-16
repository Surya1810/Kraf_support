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
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('category');
            $table->string('tag');
            $table->string('slug')->unique();
            $table->string('image')->default('default.png');
            $table->text('body');
            $table->text('desc');
            $table->integer('view_count')->default(0);
            $table->boolean('status')->default(false);
            $table->bigInteger('user_id')->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
