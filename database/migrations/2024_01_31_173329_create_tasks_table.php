<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("title",100);
            $table->longText("description");
            $table->boolean("state")->default(false);
            $table->foreignId("user_id");
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnUpdate()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('tasks', function (Blueprint $table){
            $table->timestamp('created_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
            $table->timestamp('updated_at')->default(DB::raw("CURRENT_TIMESTAMP"))->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
