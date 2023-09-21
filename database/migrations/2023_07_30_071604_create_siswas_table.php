<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignID('user_id');
            $table->string('nama_lengkap');
            $table->string('ayah');
            $table->string('ibu');
            $table->string('agama');
            $table->text('alamat');
            $table->string('foto')->nullable();
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->string('jenis_kelamin');
            $table->string('no_hp');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->char('status');
            $table->date('tgl_lahir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
