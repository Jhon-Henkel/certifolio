<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name')->nullable(false);
            $table->string('issuing_organization')->nullable(false);
            $table->date('issue_date')->nullable(false);
            $table->date('expiration_date')->nullable();
            $table->string('credential_code')->nullable();
            $table->string('credential_url')->nullable();
            $table->string('credential_file_path')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
