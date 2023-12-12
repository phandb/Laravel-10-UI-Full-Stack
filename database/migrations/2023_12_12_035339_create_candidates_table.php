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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('canFirstName');
            $table->string('canMiddleName')->nullable();
            $table->string('canLastName');
            $table->string('canSaintName')->nullable();
            $table->string('dateOfBirth')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->boolean('is_baptized_at_HVMCC')->nullable()->default(true);
            $table->string('baptizedYear')->nullable();
            $table->string('baptismForm')->nullable();
            $table->string('filePath')->nullable();
            $table->string('dadFirstName')->default("Ba");
            $table->string('dadLastName')->default("Dad");
            $table->string('dadPhone')->nullable();
            $table->string('momFirstName')->default("Me");
            $table->string('momLastName')->default("Mom"); 
            $table->string('momPhone')->nullable();
            $table->string('sponFirstName')->nullable();
            $table->string('sponLastName')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropForeign((['user_id']));
            $table->dropColumn('user_id');
        });

        Schema::dropIfExists('candidates');
    }
};
