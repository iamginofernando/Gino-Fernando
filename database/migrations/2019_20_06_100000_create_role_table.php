<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->bigIncrements('role_id');
            $table->string('display_name');
            $table->string('description');
            $table->timestamps();
        });

        DB::table('role')->insert(
            array([
                'display_name' => 'Administrator',
                'description' => 'Super user',
                'created_at' => Carbon::now()
            ],[
                'display_name' => 'User',
                'description' => 'Basic user',
                'created_at' => Carbon::now()
                ]
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');
    }
}
