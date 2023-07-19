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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
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
            $table->string('nmibu');
            $table->string('kerja_ibu');
            $table->string('pddkn_ibu');
            $table->string('no_ibu');
            $table->string('alamat_ibu');
            $table->string('nmwali');
            $table->string('kerja_wali');
            $table->string('pddkn_wali');
            $table->string('no_wali');
            $table->string('alamat_wali');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
