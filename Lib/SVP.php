<?php

namespace Symfonians\SVPBundle\Lib;

/* 
	Social Video Player
	copyright: Jean-Christophe Cuvelier - 2014 (jcc@symfonians.be)
*/

class SVP
{
    /**
     * @param $url
     * @param array $params
     * @return SVPVideo|SVPVideoYoutube|SVPVideoFacebook|SVPVideoVimeo|SVPVideoDailymotion
     */
    public static function getInstance($url, $width = null, $height = null)
    {
        if (strpos($url, 'youtu') !== false) {
            /** @var SVPVideoYoutube $instance */
            $instance = new SVPVideoYoutube($url);
        } elseif (strpos($url, 'facebook') !== false) {
            $instance = new SVPVideoFacebook($url);
        } elseif (strpos($url, 'vimeo') !== false) {
            $instance = new SVPVideoVimeo($url);
        } elseif (strpos($url, 'dailymotion') !== false) {
            $instance = new SVPVideoDailymotion($url);
        } else {
            $instance = new SVPVideo($url);
        }

        if($width) { $instance->setWidth($width); }
        if($height) { $instance->setHeight($height); }
//        if (isset($params['width'])) $instance->setWidth($params['width']);
//        if (isset($params['height'])) $instance->setHeight($params['height']);
//        if (isset($params['modestbranding'])) $instance->setModestBranding(true);
//        if (isset($params['wmode'])) $instance->setWmode($params['wmode']);

        return $instance;
    }
}

?>