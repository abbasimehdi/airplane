<?php

use App\Models\Schmas\Constants\BaseConstants;
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
        Schema::create(BaseConstants::USERS, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(BaseConstants::PASSPORT_ID)->unique();
            $table->string(BaseConstants::NAME);
            $table->string(BaseConstants::EMAIL)->unique();
            $table->timestamp(BaseConstants::EMAIl_VERIFIED_AT)->nullable();
            $table->string(BaseConstants::PASSWORD);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(BaseConstants::USERS);
    }
};
