<?php

use App\Models\User;
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
        // Schema::create('blog', function(Blueprint $table) {
        //     $table->id();
        //     $table->string('title')->unique();
        //     $table->text('body');
        //     $table->integer('author_id');
        //     $table->timestamp('date');
        //     $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
