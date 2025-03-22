<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;

    //  SI EL NOMBRE DEL MODELO  NO COINCIDE CON EL NOMBRE DE LA TABLA EN LA BASE DE DATOS, SE DEBE ESPECIFICAR EN LA PROPIEDAD DE ESTA CLASE EL NOMBRE DE LA TABLA CON LA QUE SE DESEA RELACIONAR ESTE MODELO
    protected $table = "job_listings";


    protected $fillable = [
        "title",
        "description",
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
        "company_description",
        "user_id"
    ];

    // RELATION TO USER
    public function user(): BelongsTo {
        return $this -> belongsTo(User::class);
    }
}
