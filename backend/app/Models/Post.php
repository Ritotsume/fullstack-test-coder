<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Função que busca thumbnails para exibição.
     * 
     * @param  [type] $image O caminho da imagem.
     * @param  [type] $type  O tamanho da imagem, pode ser: small, medium, croped
     * @return [type]        Retorna o caminho para a thumb da imagem.
     */
    public static function thumbnail($image, $type = null) {
        $type = is_null($type) ? 'small' : $type;

        $ext = substr($image, strrpos($image, '.'));
        $partImage = substr($image, 0, strrpos($image, '.'));

        $thumbnail = $partImage . "_{$type}" . $ext;

        return $thumbnail;
    }
}
