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
            $table->string('nik')->after('password');
            $table->date('tanggal_lahir')->default('1970-01-01')->after('nik'); // Setting a valid default date
            $table->text('alamat')->after('tanggal_lahir'); // Assuming alamat can be a longer text
            $table->string('pekerjaan')->after('alamat'); // Assuming pekerjaan is a string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nik');
            $table->dropColumn('tanggal_lahir');
            $table->dropColumn('alamat');
            $table->dropColumn('pekerjaan');
        });
    }
};
