<?php

/**
 * Class CentralHubbFacebookPluginShortCodesFbEmbeddedPost
 */
class CentralHubbFacebookPluginShortCodesFbEmbeddedPost
{
    /** @var CentralHubbFacebookPluginConfig $config */
    protected $config = null;

    /** @var CentralHubbFacebookPluginFormsForm $form */
    protected $form = null;

    /** @var string $href */
    protected $href = null;

    /** @var string $width */
    protected $width = null;

    /** @var string $showText */
    protected $showText = null;

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
        $class->width = !empty($options['width']) ? $class->form->sanitizeNumeric($options['width']) : null;
        $class->showText = !empty($options['show-text']) ? $class->form->sanitizeAlpha($options['show-text']) : null;

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
        $html .= '<div class="fb-post" ';
        $html .= 'data-href="'.$this->getHref().'" ';
        $html .= 'data-width="'.$this->getWidth().'" ';
        $html .= 'data-show-text="'.$this->getShowText().'" ';
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
        $html .= '<div class="fb-post" ';
        $html .= 'href="'.$this->getHref().'" ';
        $html .= 'width="'.$this->getWidth().'" ';
        $html .= 'show_text="'.$this->getShowText().'" ';
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
     * getWidth
     *
     * @return string
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
}
