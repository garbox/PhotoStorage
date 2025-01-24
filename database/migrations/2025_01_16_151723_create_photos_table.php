<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Gallery;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('size_mb');
            $table->foreignIdFor(User::class)->refrecnes('id')->on('users')->default(1);
            $table->foreignIdFor(Gallery::class)->refrecnes('id')->on('galleries')->default(1);;
            $table->timestamp('created_at')->useCurrent();  
            $table->timestamp('updated_at')->useCurrent(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('photos');
    }
};
