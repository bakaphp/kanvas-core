<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('users_id')->index('users_id');
            $table->integer('from_users_id')->index('from_users_id');
            $table->integer('companies_id')->index('companies_id');
            $table->integer('apps_id')->index('apps_id');
            $table->integer('system_modules_id')->index('notification_system_module_id');
            $table->integer('notification_type_id')->index('notification_type_id');
            $table->integer('entity_id')->index('entity_id');
            $table->longText('content');
            $table->tinyInteger('read')->default(0)->index('read');
            $table->dateTime('created_at')->index('created_at');
            $table->dateTime('updated_at')->nullable()->index('updated_at');
            $table->integer('is_deleted')->default(0)->index('is_deleted');
            $table->longText('content_group')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
