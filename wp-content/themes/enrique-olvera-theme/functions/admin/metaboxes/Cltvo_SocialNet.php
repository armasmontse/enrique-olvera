<?php

class Cltvo_SocialNet extends Cltvo_Metabox_Master
{
    /**
     * sobre escribiendo las opcciones del master
     */
    protected $description_metabox = "Redes Sociales";
    protected $post_type = "page";


    /**
     * proiedades de esta clase
     */
    public static $redesConUrl = [
        'facebook'      => 'Facebook',
        'instagram'     => 'Instagram',
				'twitter'       => 'Twitter',
				'spotify'       => 'Spotify',
				// 'google' => 'Google plus:',
				// 'tumblr' => 'Tumblr:'
		];

    protected static $redesSinUrl = [
        //'mail'            => 'Email:',
		];


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

        foreach (self::$redesSinUrl as $red => $label) {
    			 $meta[$red] = isset($meta[$red]) ? $meta[$red] :  "";
    		}

    		foreach (self::$redesConUrl as $red => $label) {
      			$meta[$red] = isset($meta[$red]) ? $meta[$red] :  array('label'=> '', 'url'=> '');
            $meta[$red]['label'] = isset($meta[$red]['label']) ? $meta[$red]['label'] :  "";
            $meta[$red]['url'] = isset($meta[$red]['url']) ? $meta[$red]['url'] :  "";
    		}

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
        		<table class="ancho_100" >
        			<tr>
        				<td>
        					 Email:
        				</td>
        				<td>
        					<input type="email" placeholder="ejemplo@ejemplo.com" name="<?php echo  $this->meta_key; ?>[mail]" id="<?php echo  $this->meta_key; ?>[mail]" value="<?php echo $this->meta_value['mail']; ?>" class="ancho_100 " />
        				</td>
        			</tr>
        			<?php foreach (self::$redesConUrl as $slug => $nombre): ?>
        				<tr>
        					<td>
        						<?php echo $nombre; ?>
        					</td>
        					<td>
        						<?php $this->social_network_url($slug); ?>
        					</td>
        				</tr>

        			<?php endforeach; ?>

        		</table>
        		<?php
	}



    /**
     * Imprime los input de las redes sociales
     *
     * Parametros:
     *
     * @param string $slug slug de la red social
     * @param array $meta array con los valores url y label
     */

    private function social_network_url($slug) {
    	 ?>
            <p>
                <label for="<?php echo $this->meta_key."_".$slug; ?>_label" > <?= __("Nombre" ,TRANSDOMAIN) ?>:</label><br>
                <input type="text"
                      placeholder="<?= $slug ?>"
                      name="<?php echo $this->meta_key."[".$slug."][label]"; ?>"
                      id="<?php echo $this->meta_key."_".$slug; ?>_label"
                      value="<?php echo $this->meta_value[$slug]['label']; ?>"
                      class="ancho_100" />
            </p>
    		<p>
    			<label for="<?php echo $this->meta_key."_".$slug; ?>_url" ><?= __("Link" ,TRANSDOMAIN) ?>:</label><br>
    			<input type="url"
                        placeholder="http://"
                        name="<?php echo $this->meta_key."[".$slug."][url]"; ?>"
                        id="<?php echo $this->meta_key."_".$slug; ?>_url"
                        value="<?php echo $this->meta_value[$slug]['url']; ?>"
                        class="ancho_100" />
    		</p>
    	 <?php
    }

}
