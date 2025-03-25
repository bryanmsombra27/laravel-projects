<?php
use Illuminate\Support\Str;

if (!function_exists('getImagePath')) {
    /**
     * Determina la ruta correcta de la imagen.
     * 
     * @param string $url
     * @return string
     */
    function getImagePath($image)
    {
        if(file_exists(public_path("/images/$image"))){
            return "/images/$image";
        }
        else {
            return "/storage/$image";
        }
    }
}