<?php

require_once 'consts.php';
// require 'functions.php'; // Require es como si copiara todo el codigo que esta en ese archivo, si lo duplico sale error porque habria dos funciones con el mismo nombre
require_once 'functions.php'; // Solo lo trae una vez
require_once 'classes/NextMovie.php';

// $data = get_data(API_URL);
// $until_message = get_until_message($data["days_until"]);
$next_movie = NextMovie::fetch_and_create_movie(API_URL);
$next_movie_data = $next_movie->get_data();
?>

<!-- Falta poner el <?php ?> en cada render de abajo -->
<!-- render_template('head', $data) 
render_template('main', array_merge($data,['until_message' => $until_message]))  -->

<?php render_template('head', ["title" => $next_movie_data["title"]]); ?>
<?php render_template('main', array_merge(
  $next_movie_data,
  ["until_message" => $next_movie->get_until_message()]
)); ?>
<?php render_template('styles')  ?>






