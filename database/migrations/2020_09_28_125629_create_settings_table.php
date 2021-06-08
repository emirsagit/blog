<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('aboutTitle')->default('Hakkımızda');
            $table->text('about')->nullable();
            $table->string('logo')->default('/img/logo.jpg')->nullable();

            $table->string('tel')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('github')->nullable();

            $table->string('homeTitle')->default('Anasayfa')->nullable();
            $table->string('homeSubtitle')->nullable();

            $table->string('contactTitle')->default('İletişim')->nullable();
            $table->string('contactSubtitle')->nullable();

            $table->string('authorTitle')->default('Yazarlarımız')->nullable();
            $table->string('authorSubtitle')->nullable();

            $table->string('categoryTitle')->default('Yazarlarımız')->nullable();
            $table->string('categorySubtitle')->nullable();

            $table->string('homeSeoTitle')->nullable();
            $table->string('homeSeoDescription')->nullable();

            $table->string('categorySeoTitle')->nullable();
            $table->string('categorySeoDescription')->nullable();

            $table->string('contactSeoTitle')->nullable();
            $table->string('contactSeoDescription')->nullable();

            $table->string('authorSeoTitle')->nullable();
            $table->string('authorSeoDescription')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
