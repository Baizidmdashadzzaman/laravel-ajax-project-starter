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
            $table->string('site_name')->nullable();
			$table->string('site_url')->nullable();
			$table->string('website_logo')->nullable();
			$table->string('website_fabicon')->nullable();
			$table->string('website_mobilenumber')->nullable();
			$table->string('website_email')->nullable();
			$table->longText('website_address')->nullable();
			$table->string('fb_link')->nullable();
			$table->string('twitter_link')->nullable();
			$table->string('linkdin_link')->nullable();
			$table->string('insta_link')->nullable();
			$table->string('pintest_link')->nullable();
			$table->string('whatsapp_number')->nullable();
            $table->longText('website_keywords')->nullable();
            $table->longText('website_descriptions')->nullable();
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
