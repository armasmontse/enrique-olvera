<?php

class Cltvo_Page_Home extends Cltvo_Page
{
    public $social_nets;
    public $about_images;
    public $splah_image;
    public $restaurants;

    function __construct(){
        parent::__construct(specialPage('home',true));
    }


    public function setMetas()
    {
        $this->social_nets = $this->getSocialNets();
        $this->about_images = (object) Cltvo_About_Images::getMetaValue($this->post);
        $this->splah_image = $this->getSplashImage();
        $this->restaurants = $this->getRestaurants();
    }

    public function getSplashImage()
    {
        $galley = Cltvo_Gallery::getGalleryImages( Cltvo_Gallery::getMetaValue($this->post));

        if (empty($galley)) {
            return null;
        }

        return $galley[array_rand($galley)];
    }

    protected function getSocialNets()
    {
        $social_nets = Cltvo_SocialNet::getMetaValue($this->post);

        $redes = [];

        foreach (Cltvo_SocialNet::$redesConUrl as $net => $label) {
            if (filter_var($social_nets[$net]["url"], FILTER_VALIDATE_URL)) {
                $redes[] = (object) [
                    "label" => empty($social_nets[$net]["label"]) ? $label : $social_nets[$net]["label"],
                    "url"   => $social_nets[$net]["url"],
                ];
            }
        }

        $social_nets["mail"] = filter_var($social_nets["mail"], FILTER_VALIDATE_EMAIL) ? $social_nets["mail"] : "info@grupolvera.com";

        $social_nets["nets"] = $redes;
        return (object) $social_nets;
    }


    protected function getRestaurants()
    {
        return array_map(function($post){
            return ( new Cltvo_Restaurant($post))->getHomePageMap();
        }, get_posts([
          'post_type' => 'cltvo_restaurant',
          'post_status' => array('publish', 'draft'),
          'numberposts' => -1,
          'order'    => 'ASC'
        ]));
    }

}
