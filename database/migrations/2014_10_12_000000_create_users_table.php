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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('level')->default('siswa');
            $table->enum('status_verifikasi', ['Lulus', 'Tidak Lulus', 'Menunggu'])->default('Menunggu');
            $table->enum('daftar_ulang', ['sudah', 'belum'])->default('belum');
            $table->string('nik')->unique();
            $table->string('nisn')->unique();
            $table->string('nm_siswa');
            $table->string('tempat_lahir');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->date('tgl_lahir')->default('2000-01-01');
            $table->string('umur');
            $table->string('smp');
            $table->string('foto');
            $table->string('jk');
            $table->string('bb');
            $table->string('tb');
            $table->string('sk');
            $table->string('anak_ke');
            $table->string('agama');
            $table->string('status');
            $table->string('tinggal_bersama');
            $table->string('nmayah');
            $table->string('kerja_ayah');
            $table->string('pddkn_ayah');
            $table->string('no_ayah');
            $table->string('alamat_ayah');
            // $table->string('email')->nullable()->change();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
