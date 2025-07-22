<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('description', 255);
            $table->string('reporting_user_name', 255);
            $table->foreignId('user_id')->constrained("users");
            $table->foreignId('department_id')->constrained("departments");
            $table->foreignId('ticket_type_id')->constrained("ticket_types");
            $table->foreignId('ticket_status_id')->constrained("ticket_statuses");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
