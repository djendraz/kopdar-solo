<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbKehadiran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kehadiran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_peserta')->unique();
            $table->string('nama')->nullable();
            $table->string('jk')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('nip')->nullable();
            $table->string('golongan')->nullable();
            $table->string('pangkat')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('ttl')->nullable();
            $table->string('npwp')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('alamat_unit_kerja')->nullable();
            $table->string('kabkota')->nullable();
            $table->string('propinsi')->nullable();
            $table->string('tlp_kantor')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kehadiran');
    }
}
