<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'titulo', 'descricao', 'data', 'imagem'];

    protected $appends = ['descricao_resumida'];

    public function getDescricaoResumidaAttribute(){
        return str_limit($this->getAttribute('descricao'), 200, '...');
    }

    public function getDataAttribute(){
		$data = explode('-', $this->attributes['data']);

		if(count($data) != 3)
			return "";

		$data = $data[2].'/'.$data[1].'/'.$data[0];
		return $data;
	}
}
