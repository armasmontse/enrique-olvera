<?php
require_once 'traits/Cltvo_Featured_Image_Trait.php';

class Cltvo_About_Images extends Cltvo_Metabox_Master
{
    use Cltvo_Featured_Image_Trait;
    /**
     * sobre escribiendo las opcciones del master
     */
    protected $description_metabox = "Fotografía";
    protected $post_type = "page";
    protected $position = "normal"; // posicion

  /**
	 * define el metodo donde se mostrara el meta
	 * @return boolean si es verdadero el meta sera desplegado en el admin en caso constrario no
	 */
	public static function metaboxDisplayRule(){
        // return (isset($_GET['post']) && $_GET['post'] ) ? 'template-page.php' == get_post_meta($_GET['post'], '_wp_page_template', true) : false;
		return isSpecialPage("home");
	}


    /**
     * define el metodo que inicializa el valor del meta
     */
    public static function setMetaValue($meta){

        $meta = is_array($meta) ? $meta : [] ;

        $meta["left"] =  static::setImageValue (isset($meta["left"]) ? $meta["left"] :  0);
        $meta["right"] =  static::setImageValue (isset($meta["right"]) ? $meta["right"] :  0);
        $meta["down"] =  static::setImageValue (isset($meta["down"]) ? $meta["down"] :  0);

        return $meta;
    }


	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){

        ?>
        <style media="screen">
            .ancho_100{
                width: 100%;
            }
        </style>

        <table class="ancho_100">
            <tr  ALIGN="CENTER" >
                <td>
                    <h4><?= __("Izquierda ",TRANSDOMAIN)  ?></h4>
                    <?php $this->printFeaturedImage(__("izquierda ",TRANSDOMAIN) ,["left"]) ?>
                </td>
                <td>
                    <h4><?= __("Derecha ",TRANSDOMAIN)  ?></h4>
                    <?php $this->printFeaturedImage(__("derecha ",TRANSDOMAIN) ,["right"]) ?>
                </td>
            </tr>
            <tr  ALIGN="CENTER" >
                <td colspan="2">
                    <h4><?= __("Abajo ",TRANSDOMAIN)  ?></h4>
                    <?php $this->printFeaturedImage(__("abajo ",TRANSDOMAIN) ,["down"]) ?>
                </td>
            </tr>
        </table>

        <?php

	}


}
