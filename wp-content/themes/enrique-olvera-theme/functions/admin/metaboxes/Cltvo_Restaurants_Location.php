<?php

class Cltvo_Restaurants_Location extends Cltvo_Metabox_Master
{

    /**
     * sobre escribiendo las opcciones del master
     */
    protected $description_metabox = "Ubicación";
    protected $post_type = "cltvo_restaurant";

  /**
	 * define el metodo donde se mostrara el meta
	 * @return boolean si es verdadero el meta sera desplegado en el admin en caso constrario no
	 */
	public static function metaboxDisplayRule(){
		return true;
	}

    /**
     * define el metodo que inicializa el valor del meta
     */
    public static function setMetaValue($meta){

        $meta = is_array($meta) ? $meta : [] ;

        $meta["label"] = isset($meta["label"]) ? $meta["label"] : "";

        $meta["site"] = isset($meta["site"]) ? $meta["site"] :  array('label'=> '', 'url'=> '');
        $meta["site"]['label'] = isset($meta["site"]['label']) ? $meta["site"]['label'] :  "";
        $meta["site"]['url'] = isset($meta["site"]['url']) ? $meta["site"]['url'] :  "";

        return $meta;
    }

    /**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){
        ?>
        <style media="screen">
            .ancho_100 {
                width: 100%;
            }
        </style>
        <table class="ancho_100">
            <tr>
                <td>
                     <?= __("Ubicación" ,TRANSDOMAIN)  ?>
                </td>
                <td>
                    <input type="text" placeholder="CDMX" name="<?php echo  $this->meta_key; ?>[label]" id="<?php echo  $this->meta_key; ?>[label]" value="<?php echo $this->meta_value['label']; ?>" class="ancho_100 " />
                </td>
            </tr>
            <tr>
                <td>
                    <?= __("Página" ,TRANSDOMAIN)  ?>
                </td>
                <td>
                    <p>
                        <label for="<?php echo $this->meta_key."_site"; ?>_label" > <?= __("Nombre" ,TRANSDOMAIN) ?>:</label><br>
                        <input type="text"
                              placeholder="www.pujol.com"
                              name="<?php echo $this->meta_key."[site][label]"; ?>"
                              id="<?php echo $this->meta_key."_site"; ?>_label"
                              value="<?php echo $this->meta_value["site"]['label']; ?>"
                              class="ancho_100" />
                    </p>
                    <p>
                        <label for="<?php echo $this->meta_key."_site"; ?>_url" ><?= __("Link" ,TRANSDOMAIN) ?>:</label><br>
                        <input type="url"
                                placeholder="https://www.pujol.com"
                                name="<?php echo $this->meta_key."[site][url]"; ?>"
                                id="<?php echo $this->meta_key."_site"; ?>_url"
                                value="<?php echo $this->meta_value["site"]['url']; ?>"
                                class="ancho_100" />
                    </p>
                </td>
            </tr>
        </table>
        <?php

	}


}
