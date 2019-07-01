<?php
$home_page = new Cltvo_Page_Home() ;
$GLOBALS['home_page'] = $home_page;
 ?>

<?php get_header(); ?>


    <div class="grid__row">
        <!-- seccion 'imagen y menú' -->
        <?php  include get_stylesheet_directory() . '/inc/templates/header.php'  ?>

        <!-- seccion 'about Enrique Olvera' -->
        <?php  include get_stylesheet_directory() . '/inc/templates/about.php'  ?>

        <!-- seccion 'restaurantes' -->
        <?php  include get_stylesheet_directory() . '/inc/templates/restaurants.php'  ?>

        <!-- seccion 'restaurantes' -->
        <?php  include get_stylesheet_directory() . '/inc/templates/footer.php'  ?>


    </div>

<?php get_footer(); ?>
