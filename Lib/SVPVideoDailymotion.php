<?php

namespace Symfonians\SVPBundle\Lib;

use Exception;

class SVPVideoDailymotion extends SVPVideo
{
    public function player()
    {
        $embed = str_replace('dailymotion.com/video', 'dailymotion.com/swf', $this->url);
        return $this->makeFlashObject($embed);
    }

    public function embedUrl()
    {
        throw new Exception('Embed url not implemented for Dailymotion');
    }

    public function thumbnail($params = array())
    {
        $embed = str_replace('dailymotion.com/video', 'dailymotion.com/thumbnail/video', $this->url);
        return $embed;
    }
}