<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Channal;// подключили нужные модели
use App\Film;// подключили нужные модели
use App\Cinema;// подключили нужные модели
use App\Review;// подключили нужные модели

class FilmController extends Controller
{


	public function ChannalAddBd(){

		$data = new \Htmldom('https://tv.i.ua');

		$q = Channal::select(['canal_thumb'])->first();
		if ($q == NULL){//если табл каналі пустая - парсим логотипы и заполняем. если полная - ничего не делаем
		
				$countUrl = 0;
		if($data->innertext!='' and count($data->find('[data-search] h3'))){// при записи в бд записівать по каналам! чтоб цеплять айди каналла к фильмам (єто пример на ТРК Украина)
				
  		foreach($data->find('[data-search] h3') as $channal){  
  				
  				$countUrl ++;
  				$allUrl = [
  					1 => 'http://kanalukraina.tv/ua/',
  					2 => 'http://1tv.com.ua/',
  					3 => 'http://www.1plus1.ua/',
  					4 => 'http://inter.ua/',
  					5 => 'http://www.novy.tv/',
  					6 => 'http://ictv.ua/',
  					7 => 'http://www.stb.ua/',
  				];

                foreach($channal->find('img') as $i){
                	$im = strstr($i, '//os1', false);
                	$im = strstr($im, 'alt', true);
                	$im = substr($im,  0, -2);					
                }

				foreach($channal->find('a') as $a){//1+1
	            $name = strstr($a, '>', false);
	            $name = substr($name, 1);
	            $name = substr($name,  0, -4);			
	
        		$r = new Channal;// нужная модель от нужной таблиці
            	$r->name = $name;
            	$r->url = $allUrl[$countUrl];
            	$r->canal_thumb = $im;
				$r->save();//сохраняем   }} 							 
        }       
    	}
    	}
		}
				$data->clear();
	}


	public function FilmAddBd(){

		$data = new \Htmldom('https://tv.i.ua');

		if($data->innertext!='' and count($data->find('.tv_program_item'))){
			foreach($data->find('.tv_program_item') as $li_film){
				if (strripos($li_film, 'Х/ф') != false) {// иф отчищает таблицу Film, если содержимое первой ячейки name изменилось (поменялся первый фильм на сайте)
					$li_film->find('time');
					$li_film1 = $li_film->plaintext;
					$film_name = stristr($li_film1, 'Х');
					$film_name = str_replace("&quot;", "", $film_name);
					$film_bloc = Film::select(['name'])->first();
					if ($film_bloc != $film_name[0]){ Film::truncate();} 
				}// на старте очищаем таблицу Фильмы, чтоб при перезагрузке не дописывать таблицу каждое обновление тем же самым. При каждом обновлении стр табл записывается заново				
			}
		}


		if($data->innertext!='' and count($data->find('.tv_program_item'))){
		  foreach($data->find('.tv_program_item') as $li_film){

		  	if (strripos($li_film, 'Х/ф') != false) { //в $a вид строки именно такого вида <span class="_title">Ранок з Україною</span>. (strripos($a, 'Х/ф') проверяет строку $a на наличие 'Х/ф'. Если совпадает - выводит номер позиции последнего совпадения, если нет - false

				foreach($li_film->find('time') as $start){
					$li_film1 = $li_film->plaintext;
					$film_name = stristr($li_film1, 'Х');
					$film_name = str_replace("&quot;", "", $film_name);//почему то в строку лезет &quot; убираем это

					$id_chanal = $li_film->parent();	     	

					    if (strripos($id_chanal, 'Телеканал Украина') != false) {
						    $id = 1;
						} 
						elseif (strripos($id_chanal, 'Первый Национальный') != false) {
						    $id = 2;
						} 
						elseif (strripos($id_chanal, '1+1') != false) {
						    $id = 3;
						}
						elseif (strripos($id_chanal, 'Интер') != false) {
						    $id = 4;
						}
						elseif (strripos($id_chanal, 'Новый канал') != false) {
						    $id = 5;
						}
						elseif (strripos($id_chanal, 'ICTV') != false) {
						    $id = 6;
						}
						else {
						    $id = 7;
						}
				
					$finish = $li_film->next_sibling();
					$finish = strstr($finish, '<time>');
					$finish = substr($finish, 6, 5);// вырезал время из всей строки			

					$f = new Film;
	            	$f->name = $film_name;
	            	$f->data = date("l");
	            	$f->start = $start->plaintext;//->plaintext; без тегов, только внутренний текс
	            	$f->finish = $finish;
	            	$f->channal_id = $id;
					$f->save();
			  	}
		  	}   
		  }
		}
					$data->clear();
	}


	public function ShowTv(){

		$this->ChannalAddBd();//юзает метод ChannalAddBd()
		$this->FilmAddBd();//юзает метод FilmAddBd()

		$show_channals = Channal::select(['id', 'name', 'url', 'canal_thumb'])->get();// отображение каналов
		//return view('tv')->with(['show_films' => $show_films]);//
		$show_films_before = Film::select(['id', 'name', 'data', 'start', 'finish', 'channal_id'])->where('start', '>', '06:00')->orderBy('start', 'asc')->get();// фильмы до 00:00
		$show_films_after = Film::select(['id', 'name', 'data', 'start', 'finish', 'channal_id'])->where('start', '<=', '06:00')->orderBy('start', 'asc')->get();// фильмы после 00:00
		return view('tv-films-all', compact('show_channals', 'show_films_before', 'show_films_after'));
 	}

 	public function Show_films_on_channal($id){//добавляем 

    	$channal_id = Channal::find($id);
    	$films_id_before = Film::where('channal_id', $id)->where('start', '>', '06:00')->get();
    	$films_id_after = Film::where('channal_id', $id)->where('start', '<=', '06:00')->get();

		$show_channals = Channal::select(['id', 'name', 'url', 'canal_thumb'])->get();// отображение каналов

    	return view('tv-films-on-channal', compact('channal_id','films_id_before', 'films_id_after', 'show_channals'));//'product.category' - путь
    }

    public function CinemaAddBd(){

		$data = new \Htmldom('https://kinoafisha.ua/kinoafisha/zaporozhe');		

			if($data->innertext!='' and count($data->find('.item'))){//дивы с фильмами

				Cinema::truncate();	

			$url_before = '//kinoafisha.ua';

			foreach($data->find('.item') as $div_film){

				foreach($div_film->find('.text h3 a') as $name_href){
					$name = $name_href->plaintext;
					$href = $name_href->href;
					$href = $href;
				foreach($div_film->find('.coverholder img') as $cinema_thumb){
					$cinema_thumb = $cinema_thumb->src;
					$cinema_thumb = str_replace("sm_", "", $cinema_thumb);
					$cinema_thumb = $url_before.$cinema_thumb;
				}
				foreach($div_film->find('.countries') as $country_year_genre){
					$country_year_genre = $country_year_genre->plaintext;
					$country_year_genre = str_replace("  ", "", $country_year_genre);
					$country_year = stristr($country_year_genre, '(', true);
					$genre = stristr($country_year_genre, '(');
				}
				foreach($div_film->find('.text') as $director_actors){
					$director = $director_actors->children(3)->plaintext;
					$director = str_replace("Режиссёр: ", "", $director);

					$actors = $director_actors->children(4)->plaintext;
					$actors = str_replace("Актёры: ", "", $actors);

					$in_ua = $director_actors->children(5)->plaintext;
					$in_ua = str_replace("Премьера в Украине: ", "", $in_ua);
				}
				foreach($div_film->find('.afishaschedule') as $look){
					$look = $look->plaintext;
					$look = str_replace("  ", "", $look);
					$look = '<br><h4>Кинотеатры:</h4>'.$look;
					if (strpos($look, 'Multiplex Аврора') != FALSE) {
						$look = str_replace("Multiplex Аврора", "</p><br><p><span>Multiplex Аврора</span><br>", $look);
					}
					if (strpos($look, 'Байда') != FALSE) {
						$look = str_replace("Байда", "</p><br><p><span>Байда</span><br>", $look);
					}
					if (strpos($look, 'им. Маяковского') != FALSE) {
						$look = str_replace("им. Маяковского", "</p><br><p><span>им. Маяковского</span><br>", $look);
					}
					if (strpos($look, 'им. Довженко') != FALSE) {
						$look = str_replace("им. Довженко", "</p><br><p><span>им. Довженко</span><br>", $look);
					}
					if (strpos($look, 'КиноDrive') != FALSE) {
						$look = str_replace("КиноDrive", "</p><br><p><span>КиноDrive</span><br>", $look);
					}
					$look = $look.'</p>';
				}

			$html_url = 'https://kinoafisha.ua'.$href;
			$html = new \Htmldom($html_url);
			foreach($html->find('.film-detail div.thumbHolder') as $div_filmz){

				$array_p = $div_filmz->next_sibling()->plaintext;
				if (strripos($array_p, 'Мировая премьера: ') != false) {
					$in_world = substr($array_p, strripos($array_p, 'Мировая премьера: '), 43); // strripos($dz, 'Мировая премьера: ')определили позиция входа, substr($dz, strripos($dz, 'Мировая премьера: '), 43) с этой позиции вернули в подстроку 43 символа (почему так много - не знаю, скорее всего в оригинале много пробелов)
					$in_world = str_replace("Мировая премьера: ", "", $in_world);
				}
				else $in_world = $in_ua;

				if (strripos($array_p, 'Бюджет') != false) {
					$budget = substr($array_p, strripos($array_p, 'Бюджет'), 30);
					$budget = str_replace("Бюджет,", "", $budget);
				}
				else $budget = NULL;

				if (strripos($array_p, 'Мировые кассовые сборы,') != false) {
					$sum = substr($array_p, strripos($array_p, 'Мировые кассовые сборы,'), 60);
					$sum = str_replace("Мировые кассовые сборы,", "", $sum);
				}
				else $sum = NULL;

				if (strripos($array_p, 'Продолжительность: ') != false) {
					$time = substr($array_p, strripos($array_p, 'Продолжительность: '), 52);
					$time = str_replace("Продолжительность: ", "", $time);
				}
				else $time = NULL;
			}
			foreach($html->find('.description') as $div_description){
				$description = $div_description->outertext;
				$description = str_replace("&nbsp;", " ", $description);
				$description = str_replace("<span>", " ", $description);
				$description = str_replace("</span>", " ", $description);
			}

			foreach($html->find('.shots-holder') as $frame_img){

				if ($frame_img->children(0)->href == false) {
					$frame_thumb_6 = NULL;
					$frame_thumb_5 = NULL;
					$frame_thumb_4 = NULL;
					$frame_thumb_3 = NULL;
					$frame_thumb_2 = NULL;
					$frame_thumb_1 = NULL;
				}
				elseif ($frame_img->children(1)->href == false) {
					$frame_thumb_6 = NULL;
					$frame_thumb_5 = NULL;
					$frame_thumb_4 = NULL;
					$frame_thumb_3 = NULL;
					$frame_thumb_2 = NULL;
					$frame_thumb_1 = $url_before.$frame_img->children(0)->href;
				}
				elseif ($frame_img->children(2)->href == false) {
					$frame_thumb_6 = NULL;
					$frame_thumb_5 = NULL;
					$frame_thumb_4 = NULL;
					$frame_thumb_3 = NULL;
					$frame_thumb_2 = $url_before.$frame_img->children(1)->href;
					$frame_thumb_1 = $url_before.$frame_img->children(0)->href;
				}
				elseif ($frame_img->children(3)->href == false) {
					$frame_thumb_6 = NULL;
					$frame_thumb_5 = NULL;
					$frame_thumb_4 = NULL;
					$frame_thumb_3 = $url_before.$frame_img->children(2)->href;
					$frame_thumb_2 = $url_before.$frame_img->children(1)->href;
					$frame_thumb_1 = $url_before.$frame_img->children(0)->href;
				}
				elseif ($frame_img->children(4)->href == false) {
					$frame_thumb_6 = NULL;
					$frame_thumb_5 = NULL;
					$frame_thumb_4 = $url_before.$frame_img->children(3)->href;				
					$frame_thumb_3 = $url_before.$frame_img->children(2)->href;
					$frame_thumb_2 = $url_before.$frame_img->children(1)->href;
					$frame_thumb_1 = $url_before.$frame_img->children(0)->href;
				}
				elseif ($frame_img->children(5)->href == false) {
					$frame_thumb_6 = NULL;
					$frame_thumb_5 = $url_before.$frame_img->children(4)->href;	
					$frame_thumb_4 = $url_before.$frame_img->children(3)->href;				
					$frame_thumb_3 = $url_before.$frame_img->children(2)->href;
					$frame_thumb_2 = $url_before.$frame_img->children(1)->href;
					$frame_thumb_1 = $url_before.$frame_img->children(0)->href;
				}																
				else {$frame_thumb_6 = $frame_img->children(5)->href;
					$frame_thumb_6 = $url_before.$frame_img->children(5)->href;	
					$frame_thumb_5 = $url_before.$frame_img->children(4)->href;	
					$frame_thumb_4 = $url_before.$frame_img->children(3)->href;				
					$frame_thumb_3 = $url_before.$frame_img->children(2)->href;
					$frame_thumb_2 = $url_before.$frame_img->children(1)->href;
					$frame_thumb_1 = $url_before.$frame_img->children(0)->href;}
			}
	
					$f = new Cinema;// нужная модель от нужной таблицы
	            	$f->name = $name;
	            	$f->cinema_thumb = $cinema_thumb;
	            	$f->href = $href;
	            	$f->day = date("l");
	            	$f->country_year = $country_year;
					$f->genre = $genre;
					$f->director = $director;
					$f->actors = $actors;
					$f->in_ua = $in_ua;
	            	$f->in_world = $in_world;
					$f->budget = $budget;
					$f->sum = $sum;
					$f->time = $time;
					$f->description = $description;
	            	$f->frame_thumb_1 = $frame_thumb_1;	
					$f->frame_thumb_2 = $frame_thumb_2;
					$f->frame_thumb_3 = $frame_thumb_3;
					$f->frame_thumb_4 = $frame_thumb_4;
					$f->frame_thumb_5 = $frame_thumb_5;
					$f->frame_thumb_6 = $frame_thumb_6;
					$f->look = $look;

					$f->save();
				}
			}
		}
					$data->clear();
	}

	public function ShowCinema(){


			$day_bd = Cinema::first();
			if ($day_bd == NULL){//если табл синема пустая, запускаем метод CinemaAddBd()
			$this->CinemaAddBd();			
			}
			else {// если полнаю, проверяем первую ячейку day, если сейчас не тот день что в табл - юзаем метод CinemaAddBd(), если совпадает, не перезаписываем табл.
			$day_bd = $day_bd->day;
			$day_now = date("l");
			if ($day_now != $day_bd){ 
				
			$this->CinemaAddBd();//юзает метод CinemaAddBd()
			}
			}

		$show_cinema = Cinema::select(['id', 'name', 'cinema_thumb', 'href', 'country_year', 'genre', 'director', 'actors', 'in_ua', 'in_world', 'budget', 'sum', 'time', 'description', 'frame_thumb_1', 'frame_thumb_2', 'frame_thumb_3', 'frame_thumb_4', 'frame_thumb_5', 'frame_thumb_6',  'look'])->get();

		return view('cinema', compact('show_cinema'));
 	}

 	public function ShowCinema_id($id){//добавляем 

		$show_cinema_id = Cinema::where('id', $id)->get();

		return view('cinema-id', compact('show_cinema_id'));
    }

    public function addReview(Request $request){//добавляем метод для создания отзывов. То что передаем в форме будет в переменной $request

    	$r = new Review;
    	$r->name = $request->name;
    	$r->text = $request->text;
    	$r->save();

    	$show_review = Review::select(['id', 'name', 'text', 'created_at'])->latest()->limit(10)->get();

    	return view('contact-all', compact('show_review'));
    }

	public function ShowReview(){

		$show_review = Review::select(['id', 'name', 'text', 'created_at'])->latest()->limit(3)->get();

		return view('contact', compact('show_review'));
	}

	public function ShowReviewAll(){

		$show_review = Review::select(['id', 'name', 'text', 'created_at'])->latest()->limit(10)->get();

		return view('contact-all', compact('show_review'));
	}	
}
