<?php
/**
 * Date: 10/06/14
 * Time: 10:54
 * Author: Jean-Christophe Cuvelier <jcc@symfonians.be>
 */

namespace Symfonians\SVPBundle\Twig;

use Exception;
use Symfonians\SVPBundle\Lib\SVP;
use Twig_Extension;
use Twig_Filter_Method;

class SVPExtension extends Twig_Extension {

    public function getName()
    {
        return 'svp_video_extension';
    }

    public function getFilters()
    {
        return array(
            'svp_thumbnail' => new Twig_Filter_Method($this, 'videoThumbnail'),
        );
    }

    public function videoThumbnail($url, $default_thumbnail = null)
    {
        $video = SVP::getInstance($url);

        try {
            return $video->thumbnail();
        }
        catch(Exception $e)
        {
            if($default_thumbnail)
            {
                return $default_thumbnail;
            }
            else
            {
                return null;
                // '<!-- ' . $e->getMessage() . ' -->';
            }
        }
    }
}