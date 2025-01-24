<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('qrcode_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->foreignIdFor(User::class)->refrecnes('id')->on('users')->default(1);
            $table->timestamp('created_at')->useCurrent();  
            $table->timestamp('updated_at')->useCurrent(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qrcode_tokens');
    }
};
