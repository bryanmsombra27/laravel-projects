<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // ELIMINAR TODOS LOS REGISTROS  PREVIOS PARA EVITAR PROBLEMAS A LA HORA DE MIGRAR  (SOLO HACERLO EN DESARROLLO)
        DB::table('job_listings')->truncate();


        Schema::table('job_listings', function (Blueprint $table) {
            $table -> unsignedBigInteger("user_id")-> after("id"); 

            $table->integer("salary");
            $table->string("tags")->nullable();
            $table->enum("job_type", ["Full-Time", "Part-Time", "Contract", "Temporary", "Internship", "Volunteer", "On-Call"])->default("Full-time");
            $table->boolean("remote")->default(false);
            $table->text("requirements")->nullable();
            $table->text("benefits")->nullable();
            $table->string("address")->nullable();
            $table->string("city");
            $table->string("state");
            $table->string("zipcode")->nullable();
            $table->string("contact_email");
            $table->string("contact_phone")->nullable();
            $table->string("company_name");
            $table->text("company_description")->nullable();
            $table->string("company_logo")->nullable();
            $table->string("company_website")->nullable();


            // add user foriegn key 
            $table-> foreign("user_id") -> references("id") -> on("users") -> onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listings', function (Blueprint $table) {
            // eliminar las relaciones
            $table -> dropForeign(["user_id"]);
            $table -> dropColumn("user_id");


            //SI SE REVIERTEN LOS CAMBIOS DE LA MIGRACION LO INDICADO SERIA DESHACER LAS COLUMNAS QUE SE AGREGARON EN EL METODO UP POR LO QUE SE UTILIZARIA EL METODO DROPCOLUMN PARA HACER ESO
            $table->dropColumn([
                "salary",
                "job_type",
                "remote",
                "tags",
                "address",
                "city",
                "state",
                "zipcode",
                "contact_email",
                "contact_phone",
                "company_name",
                "company_logo",
                "company_website",
                "requirements",
                "benefits",
                "company_description"

            ]);
        });
    }
};
