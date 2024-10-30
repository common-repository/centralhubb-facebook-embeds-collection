<?php

/**
 * Class CentralHubbFacebookPluginShortCodesFbGroupPlugin
 */
class CentralHubbFacebookPluginShortCodesFbGroupPlugin
{
    /** @var CentralHubbFacebookPluginConfig $config */
    protected $config = null;

    /** @var CentralHubbFacebookPluginFormsForm $form */
    protected $form = null;

    /** @var string $href */
    protected $href = null;

    /** @var string $showSocialContext */
    protected $showSocialContext = null;

    /** @var string $showMetadata */
    protected $showMetadata = null;

    /** @var integer $width */
    protected $width = null;

    /** @var string $skin */
    protected $skin = null;

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
        $class->showSocialContext = !empty($options['show-social-context']) ? $class->form->sanitizeAlpha($options['show-social-context']) : null;
        $class->showMetadata = !empty($options['show-metadata']) ? $class->form->sanitizeAlpha($options['show-metadata']) : null;
        $class->width = !empty($options['width']) ? $class->form->sanitizeNumeric($options['width']) : null;
        $class->skin = !empty($options['skin']) ? $class->form->sanitizeAlpha($options['skin']) : null;

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
        $html .= '<div class="fb-group" ';
        $html .= 'data-show-social-context="'.$this->getShowSocialContext().'" ';
        $html .= 'data-href="'.$this->getHref().'" ';
        $html .= 'data-show-metadata="'.$this->getShowMetadata().'" ';
        $html .= 'data-width="'.$this->getWidth().'" ';
        $html .= 'data-skin="'.$this->getSkin().'" ';
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
        $html .= '<div class="fb-group" ';
        $html .= 'show_social_context="'.$this->getShowSocialContext().'" ';
        $html .= 'href="'.$this->getHref().'" ';
        $html .= 'show_metadata="'.$this->getShowMetadata().'" ';
        $html .= 'width="'.$this->getWidth().'" ';
        $html .= 'skin="'.$this->getSkin().'" ';
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
     * getShowSocialContext
     *
     * @return string
     */
    public function getShowSocialContext()
    {
        return esc_attr($this->showSocialContext);
    }

    /**
     * getShowMetadata
     *
     * @return string
     */
    public function getShowMetadata()
    {
        return esc_attr($this->showMetadata);
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
     * getSkin
     *
     * @return int
     */
    public function getSkin()
    {
        return esc_attr($this->skin);
    }
}
