<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Banner extends Model
{
	protected $fillable = ['user_id', 'imagem', 'data']; 

	public function getDataAttribute(){
		$data = explode('-', $this->attributes['data']);

		if(count($data) != 3)
			return "";

		$data = $data[2].'/'.$data[1].'/'.$data[0];
		return $data;
	}
}
