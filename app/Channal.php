<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channal extends Model
{
        public function film(){//добавили связи, модели продукт с моделью кетигори. и указываем в какой колонке устанавливается эта связь
    	return $this->belongsTo('App\Film', 'film_id');
    	}

    	
}
