<?php

class Cltvo_Restaurant extends Cltvo_PostTypeCustom_Master
{

    const nombre_plural = 'Restaurantes';
    const nombre_singular = 'restaurante';
    const slug = 'restaurante';

	const publicly_queryable = false;
	const has_archive = false;

	protected static $supports = array( 'title','editor','thumbnail');

    public $location;
    public $photos;
    public $has_popup;

    public function setMetas()
    {
        $this->photos = Cltvo_Restaurants_Images::getMetaValue($this->post);
        $this->location = $this->getLocation();
        $this->has_popup = $this->getHasPopup();
    }

    protected function getHasPopup()
    {
        return ($this->post->post_status == 'publish') ? true: false;
    }

    protected function getLocation()
    {
        $location = Cltvo_Restaurants_Location::getMetaValue($this->post);

        $location["site"] = (object) [
            "label" => $location["site"]["label"],
            "url"   => filter_var($location["site"]["url"], FILTER_VALIDATE_URL) ? $location["site"]["url"] : "",
        ];

        return (object) $location;
    }


    public function getHomePageMap()
    {
        $restaurant_maped = [];

        $restaurant_maped["photos"] = (object) array_map(function($img){
            return $img ? $img->getMinified() : $img;
        },$this->photos);

        $restaurant_maped["location"] = $this->location;
        $restaurant_maped["thumbail_img"]   = $this->thumbail_img ? $this->thumbail_img->getMinified() : $this->thumbail_img ;

        $restaurant_maped["title"] = $this->post->post_title;
        $restaurant_maped["slug"] = $this->post->post_name;
        $restaurant_maped["id"] = $this->post->ID;

        $restaurant_maped["content"] = wpautop($this->post->post_content);

        $restaurant_maped["has_popup"] = $this->has_popup;

        return (object) $restaurant_maped ;
    }

}
