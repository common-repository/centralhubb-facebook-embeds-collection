<?php

/**
 * Class CentralHubbFacebookPluginShortCodesFbEmbeddedVideo
 */
class CentralHubbFacebookPluginShortCodesFbEmbeddedVideo
{
    /** @var CentralHubbFacebookPluginConfig $config */
    protected $config = null;

    /** @var CentralHubbFacebookPluginFormsForm $form */
    protected $form = null;

    /** @var string $href */
    protected $href = null;

    /** @var string $allowFullScreen */
    protected $allowFullScreen = null;

    /** @var string $autoPlay */
    protected $autoPlay = null;

    /** @var integer $width */
    protected $width = null;

    /** @var string $showText */
    protected $showText = null;

    /** @var string $showCaptions */
    protected $showCaptions = null;

    /**
     * CentralHubbEmbedsFbComments constructor.
     */
    public function __construct()
    {
        $this->config = new CentralHubbFacebookPluginConfig();
        $this->form = new CentralHubbFacebookPluginFormsForm();
    }

    /**
     * get_short_code_fb_comments.
     *
     * @param array $options
     * @return string
     */
    public static function get_short_code($options = []) {
        $class = new self();
        $class->href = !empty($options['href']) ? $class->form->sanitizeUrl($options['href']) : null;
        $class->allowFullScreen = !empty($options['allow-full-screen']) ? $class->form->sanitizeAlpha($options['allow-full-screen']) : null;
        $class->autoPlay = !empty($options['auto-play']) ? $class->form->sanitizeAlpha($options['auto-play']) : null;
        $class->width = !empty($options['width']) ? $class->form->sanitizeNumeric($options['width']) : null;
        $class->showText = !empty($options['show-text']) ? $class->form->sanitizeAlpha($options['show-text']) : null;
        $class->showCaptions = !empty($options['show-captions']) ? $class->form->sanitizeAlpha($options['show-captions']) : null;

        if($class->config->getShortCodeFormat() == 'html5') {
            return $class->get_short_code_html5();
        } else {
            return $class->get_short_code_html4();
        }
    }

    /**
     * get_short_code_html5.
     *
     * @return string
     */
    public function get_short_code_html5() {
        $html = '';
        $html .= '<div class="fb-video" ';
        $html .= 'data-href="'.$this->getHref().'" ';
        $html .= 'data-allowfullscreen="'.$this->getAllowFullScreen().'" ';
        $html .= 'data-autoplay="'.$this->getAutoPlay().'" ';
        $html .= 'data-width="'.$this->getWidth().'" ';
        $html .= 'data-show-text="'.$this->getShowText().'" ';
        $html .= 'data-show-captions="'.$this->getShowCaptions().'" ';
        $html .= '></div>';
        return $html;
    }

    /**
     * get_short_code_html4.
     *
     * @return string
     */
    public function get_short_code_html4() {
        $html = '';
        $html .= '<div class="fb-video" ';
        $html .= 'href="'.$this->getHref().'" ';
        $html .= 'allowfullscreen="'.$this->getAllowFullScreen().'" ';
        $html .= 'autoplay="'.$this->getAutoPlay().'" ';
        $html .= 'width="'.$this->getWidth().'" ';
        $html .= 'show_text="'.$this->getShowText().'" ';
        $html .= 'show_captions="'.$this->getShowCaptions().'" ';
        $html .= '></div>';

        return $html;
    }

    /**
     * getConfig
     *
     * @return CentralHubbFacebookPluginConfig
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * getForm
     *
     * @return CentralHubbFacebookPluginFormsForm
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * getHref
     *
     * @return string
     */
    public function getHref()
    {
        return esc_attr($this->href);
    }

    /**
     * getAllowFullScreen
     *
     * @return string
     */
    public function getAllowFullScreen()
    {
        return esc_attr($this->allowFullScreen);
    }

    /**
     * getAutoPlay
     *
     * @return string
     */
    public function getAutoPlay()
    {
        return esc_attr($this->autoPlay);
    }

    /**
     * getWidth
     *
     * @return int
     */
    public function getWidth()
    {
        return esc_attr($this->width);
    }

    /**
     * getShowText
     *
     * @return string
     */
    public function getShowText()
    {
        return esc_attr($this->showText);
    }

    /**
     * getShowCaptions
     *
     * @return string
     */
    public function getShowCaptions()
    {
        return esc_attr($this->showCaptions);
    }
}
