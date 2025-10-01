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
        Schema::create('paslons', function (Blueprint $table) {
            $table->id();
            $table->string('nipd1',4);
            $table->string('nisn1',10);
            $table->string('nama1');
            $table->char('jk1',1);
            $table->string('tmpt_lahir1',100);
            $table->date('tgl_lahir1');
            $table->string('agama1',100)->default('Islam');
            $table->string('alamat1');
            $table->string('nipd2',4);
            $table->string('nisn2',10);
            $table->string('nama2');
            $table->char('jk2',1);
            $table->string('tmpt_lahir2',100);
            $table->date('tgl_lahir2');
            $table->string('agama2',100)->default('Islam');
            $table->string('alamat2');
            $table->string('foto');
            $table->string('slogan');
            $table->tinyInteger('no_urut')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paslons');
    }
};
