<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="DZ1.css">
</head>
<body>

<?php 

foreach ($show_channal as $p1) {// отрисовка логотипов трк укт из бд. $p - переменная из контроллера метод show
    echo $p1->name;
    echo $p1->url;
    echo $p1->canal_thumb.'<br>';


}


// ///$data = file_get_html('https://tv.i.ua');
// $data = new \Htmldom('https://tv.i.ua');
// //$a_links = $data->find('.tv_program_item .current');
// //$a_links = $data->find('.-current');
// //echo $a_links[ 2 ];

// if($data->innertext!='' and count($data->find('[data-search=trk-ukraina]'))){// при записи в бд записівать по каналам! чтоб цеплять айди каналла к фильмам (єто пример на ТРК Украина)
//   foreach($data->find('[data-search=trk-ukraina]') as $channal){

//         echo $channal.'</br>';

//                 foreach($channal->find('img') as $i){//логотип ТРК Украина
//                         echo $i.'</br>';
//                 }

//     }
// }


// if($data->innertext!='' and count($data->find('.tv_program_item'))){
//   foreach($data->find('.tv_program_item') as $li_film){

// //foreach($li_film->find('time') as $f){
// //echo $key.'<br>'; 
// //echo $f.'<br>';


//     if (strripos($li_film, 'Х/ф') != false) { //в $a вид строки именно такого вида <span class="_title">Ранок з Україною</span>. (strripos($a, 'Х/ф') проверяет строку $a на наличие 'Х/ф'. Если совпадает - выводит номер позиции последнего совпадения, если нет - false

//     foreach($li_film->find('time') as $time){
//         $film_name = stristr($li_film, 'Х');
//         echo $time.'</br>';// в $time отдельно время начала фильмов
//         echo $film_name.'</br>';// в $film_name отдельно навание  фильмов + Х/ф
//         //echo stristr($li_film, 'Х');// в $time отдельно время начала фильмов
    
//         echo '</br>';
//     }
//     }   
//   }
// //}
// }
?>

<!-- $html = new \Htmldom('http://ru.wikipedia.org'); // родной пример 

// Find all images 
foreach($html->find('img') as $element) 
       echo $element. '<br>';

// Find all links 
foreach($html->find('a') as $element) 
       echo $element->href . '<br>'; -->




</body>
</html>