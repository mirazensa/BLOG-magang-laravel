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
        Schema::table('users', function (Blueprint $table) {
            $table->string('foto')->nullable();
            $table->string('alamat')->default('Alamat belum di tambahkan');
            $table->string('telepon')->default('telepon belum di tambahkan');
            $table->string('keahlian')->default('keahlian belum di tambahkan');
            $table->text('words')->default('words belum di tambahkan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
