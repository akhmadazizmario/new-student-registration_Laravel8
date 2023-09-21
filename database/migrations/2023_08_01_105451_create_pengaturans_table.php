<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaturansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaturans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignID('user_id');
            $table->string('kepala_sekolah')->nullable();
            $table->string('foto_kplsekolah')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('logo_sekolah')->nullable();
            $table->text('sambutan')->nullable();
            $table->text('maps')->nullable();
            $table->text('tentang_sekolah')->nullable();
            $table->string('nohp')->nullable();
            $table->string('email')->nullable();
            $table->string('grup_wa')->nullable();
            $table->string('foto_brosur')->nullable();
            $table->string('tgl_pendaftaran_awal')->nullable();
            $table->string('tgl_pendaftaran_akhir')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaturans');
    }
}
