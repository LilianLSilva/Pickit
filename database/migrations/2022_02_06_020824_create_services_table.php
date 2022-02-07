<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('cost', 8,2)->default(0);
            $table->timestamps();
        });

        DB::table('services')->insert([
            ['name' => 'Cambio de filtro', 'cost' => 10],
            ['name' => 'Cambio de correas', 'cost' => 12],
            ['name' => 'Cambio de aceite', 'cost' => 4],
            ['name' => 'Revision General', 'cost' => 5],
            ['name' => 'Pintura', 'cost' => 6],
            ['name' => 'Otro', 'cost' => 2],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
