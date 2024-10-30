<?php

/**
 * Class CentralHubbFacebookPluginShortCodesFbPagePlugin
 */
class CentralHubbFacebookPluginShortCodesFbPagePlugin
{
    /** @var CentralHubbFacebookPluginConfig $config */
    protected $config = null;

    /** @var CentralHubbFacebookPluginFormsForm $form */
    protected $form = null;

    /** @var string $href */
    protected $href = null;

    /** @var integer $width */
    protected $width = null;

    /** @var integer $height */
    protected $height = null;

    /** @var string $tabs */
    protected $tabs = null;

    /** @var string $hideCover */
    protected $hideCover = null;

    /** @var string $showFacePile */
    protected $showFacePile = null;

    /** @var string $hideCta */
    protected $hideCta = null;

    /** @var string $smallHeader */
    protected $smallHeader = null;

    /** @var string $adaptContainerWidth */
    protected $adaptContainerWidth = null;

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
        $class->width = !empty($options['width']) ? $class->form->sanitizeAlphaNumeric($options['width']) : null;
        $class->height = !empty($options['height']) ? $class->form->sanitizeAlphaNumeric($options['height']) : null;
        $class->tabs = !empty($options['tabs']) ? $class->form->sanitizeAlpha($options['tabs']) : null;
        $class->hideCover = !empty($options['hide-cover']) ? $class->form->sanitizeAlpha($options['hide-cover']) : null;
        $class->showFacePile = !empty($options['show-face-pile']) ? $class->form->sanitizeAlpha($options['show-face-pile']) : null;
        $class->hideCta = !empty($options['hide-cta']) ? $class->form->sanitizeAlpha($options['hide-cta']) : null;
        $class->smallHeader = !empty($options['small-header']) ? $class->form->sanitizeAlpha($options['small-header']) : null;
        $class->adaptContainerWidth = !empty($options['adapt-container-width']) ? $class->form->sanitizeAlpha($options['adapt-container-width']) : null;

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
        $html .= '<div class="fb-page" ';
        $html .= 'data-href="'.$this->getHref().'" ';
        $html .= 'data-width="'.$this->getWidth().'" ';
        $html .= 'data-height="'.$this->getHeight().'" ';
        $html .= 'data-tabs="'.$this->getTabs().'" ';
        $html .= 'data-hide-cover="'.$this->getHideCover().'" ';
        $html .= 'data-show-facepile="'.$this->getShowFacePile().'" ';
        $html .= 'data-hide-cta="'.$this->getHideCta().'" ';
        $html .= 'data-small-header="'.$this->getSmallHeader().'" ';
        $html .= 'data-adapt-container-width="'.$this->getAdaptContainerWidth().'" ';
        $html .= '></div>';
        return $html;
    }

    /**
     * get_short_code_html4.
     *
     * @return string
     */
    public function get_short_code_html4()
    {
        $html = '';
        $html .= '<div class="fb-page" ';
        $html .= 'href="'.$this->getHref().'" ';
        $html .= 'width="'.$this->getWidth().'" ';
        $html .= 'height="'.$this->getHeight().'" ';
        $html .= 'tabs="'.$this->getTabs().'" ';
        $html .= 'hide_cover="'.$this->getHideCover().'" ';
        $html .= 'show_facepile="'.$this->getShowFacePile().'" ';
        $html .= 'hide_cta="'.$this->getHideCta().'" ';
        $html .= 'small_header="'.$this->getSmallHeader().'" ';
        $html .= 'adapt_container_width="'.$this->getAdaptContainerWidth().'" ';
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
     * @return int
     */
    public function getWidth()
    {
        return esc_attr($this->width);
    }

    /**
     * getHeight
     *
     * @return int
     */
    public function getHeight()
    {
        return esc_attr($this->height);
    }

    /**
     * getTabs
     *
     * @return string
     */
    public function getTabs()
    {
        return esc_attr($this->tabs);
    }

    /**
     * getHideCover
     *
     * @return string
     */
    public function getHideCover()
    {
        return esc_attr($this->hideCover);
    }

    /**
     * getShowFacePile
     *
     * @return string
     */
    public function getShowFacePile()
    {
        return esc_attr($this->showFacePile);
    }

    /**
     * getHideCta
     *
     * @return string
     */
    public function getHideCta()
    {
        return esc_attr($this->hideCta);
    }

    /**
     * getSmallHeader
     *
     * @return string
     */
    public function getSmallHeader()
    {
        return esc_attr($this->smallHeader);
    }

    /**
     * getAdaptContainerWidth
     *
     * @return string
     */
    public function getAdaptContainerWidth()
    {
        return esc_attr($this->adaptContainerWidth);
    }
}
