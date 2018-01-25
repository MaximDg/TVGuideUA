<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
        public function channal(){//добавили связи, модели фильм с моделью канал. и указываем в какой колонке устанавливается эта связь
    	return $this->belongsTo('App\Channal', 'channal_id');
    	}
}
