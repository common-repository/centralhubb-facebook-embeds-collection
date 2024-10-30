<?php

/**
 * Class CentralHubbFacebookPluginShortCodesFbSaveButton
 */
class CentralHubbFacebookPluginShortCodesFbShareButton
{
    /** @var CentralHubbFacebookPluginConfig $config */
    protected $config = null;

    /** @var CentralHubbFacebookPluginFormsForm $form */
    protected $form = null;

    /** @var string $href */
    protected $href = null;

    /** @var string $layout */
    protected $layout = null;

    /** @var string $mobileIframe */
    protected $mobileIframe = null;

    /** @var string $size */
    protected $size = null;

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
        $class->layout = !empty($options['layout']) ? $class->form->sanitizeAlpha($options['layout']) : null;
        $class->mobileIframe = !empty($options['mobile-iframe']) ? $class->form->sanitizeAlpha($options['mobile-iframe']) : null;
        $class->size = !empty($options['size']) ? $class->form->sanitizeAlpha($options['size']) : null;

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
        $html .= '<div class="fb-share-button" ';
        $html .= 'data-href="'.$this->getHref().'" ';
        $html .= 'data-layout="'.$this->getLayout().'" ';
        $html .= 'data-mobile_iframe="'.$this->getMobileIframe().'" ';
        $html .= 'data-size="'.$this->getSize().'" ';
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
        $html .= '<div class="fb-share-button" ';
        $html .= 'href="'.$this->getHref().'" ';
        $html .= 'layout="'.$this->getLayout().'" ';
        $html .= 'mobile_iframe="'.$this->getMobileIframe().'" ';
        $html .= 'size="'.$this->getSize().'" ';
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
     * getLayout
     *
     * @return string
     */
    public function getLayout()
    {
        return esc_attr($this->layout);
    }

    /**
     * getMobileIframe
     *
     * @return string
     */
    public function getMobileIframe()
    {
        return esc_attr($this->mobileIframe);
    }

    /**
     * getSize
     *
     * @return string
     */
    public function getSize()
    {
        return esc_attr($this->size);
    }
}