<?php

/**
 * Pretty much what it says on the tin...
 *
 * @author     Jack Wright <mrjackwright@outlook.com>
 * @copyright  2019 OpenGL License
 * @version    Release: @package_version@
 * @link       https://jackscv.co.uk/
 */

namespace Services;

class UrlBuilder

{
    private $url;
    private $options;

    /**
     * @param string $url
     * @return UrlBuilder
     */
    public
    function setDefaultURL(string $url): UrlBuilder
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param array $options
     * @return UrlBuilder
     */
    public
    function setOptions(array $options): UrlBuilder
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return string
     */
    public
    function build(): string
    {
        $this->url .= '?';
        $iteration = 0;
        foreach ($this->options as $key => $option) {
            if ($iteration !== 0) {
                $this->url .= "&";
            }
            $this->url .= $key . '=' . $option;
            $iteration++;
        }
        return $this->url;
    }
}
