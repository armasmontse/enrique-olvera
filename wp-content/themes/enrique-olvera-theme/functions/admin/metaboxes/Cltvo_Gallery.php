<?php
require_once 'traits/Cltvo_Gallery_Trait.php';


class Cltvo_Gallery extends Cltvo_Metabox_Master
{
    use Cltvo_Gallery_Trait;

    /**
     * sobre escribiendo las opcciones del master
     */
    protected $description_metabox = "Imágenes de portada";
    protected $post_type = "page";

  /**
	 * define el metodo donde se mostrara el meta
	 * @return boolean si es verdadero el meta sera desplegado en el admin en caso constrario no
	 */
	public static function metaboxDisplayRule(){
        // return (isset($_GET['post']) && $_GET['post'] ) ? 'template-page.php' == get_post_meta($_GET['post'], '_wp_page_template', true) : false;
		return isSpecialPage("home");
	}

    protected static function getGalleyParts()
	{
		return [
            "imagen"			=> [
                    "image_id"
                ]
            ];
	}

    /**
     * define el metodo que inicializa el valor del meta
     */
    public static function setMetaValue($meta){
        return  static::setGalleryMeta(static::getGalleyParts(), $meta);
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
            <tr valign  ="TOP">
                <td >
                    <h4 style="text-align:center"><?= __("Fotografías ",TRANSDOMAIN)  ?></h4>
                    <?php $this->printGallery(static::getGalleyParts(),[]);; ?>
                </td>
            </tr>
        </table>
        <input type="hidden" name=" <?= $this->meta_key ?>[init]" value="1">
        <?php

	}



}
