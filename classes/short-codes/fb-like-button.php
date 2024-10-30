<?php

/**
 * Class CentralHubbFacebookPluginShortCodesFbLikeButton
 */
class CentralHubbFacebookPluginShortCodesFbLikeButton
{
    /** @var CentralHubbFacebookPluginConfig $config */
    protected $config = null;

    /** @var CentralHubbFacebookPluginFormsForm $form */
    protected $form = null;

    /** @var string $action */
    protected $action = null;

    /** @var string $colorScheme */
    protected $colorScheme = null;

    /** @var string $href */
    protected $href = null;

    /** @var string $kidDirectedSite */
    protected $kidDirectedSite = null;

    /** @var string $layout */
    protected $layout = null;

    /** @var string $ref */
    protected $ref = null;

    /** @var string $share */
    protected $share = null;

    /** @var string $showFaces */
    protected $showFaces = null;

    /** @var string $size */
    protected $size = null;

    /** @var integer $width */
    protected $width = null;

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
        $class->action = !empty($options['action']) ? $class->form->sanitizeAlpha($options['action']) : null;
        $class->colorScheme = !empty($options['color-scheme']) ? $class->form->sanitizeAlpha($options['color-scheme']) : null;
        $class->href = !empty($options['href']) ? $class->form->sanitizeUrl($options['href']) : null;
        $class->kidDirectedSite = !empty($options['kid-directed-site']) ? $class->form->sanitizeAlpha($options['kid-directed-site']) : null;
        $class->layout = !empty($options['layout']) ? $class->form->sanitizeAlpha($options['layout']) : null;
        $class->ref = !empty($options['ref']) ? $class->form->sanitizeAlphaNumeric($options['ref']) : null;
        $class->share = !empty($options['share']) ? $class->form->sanitizeAlpha($options['share']) : null;
        $class->showFaces = !empty($options['show-faces']) ? $class->form->sanitizeAlpha($options['show-faces']) : null;
        $class->size = !empty($options['size']) ? $class->form->sanitizeAlpha($options['size']) : null;
        $class->width = !empty($options['width']) ? $class->form->sanitizeNumeric($options['width']) : null;

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
        $html .= '<div class="fb-like" ';
        $html .= 'data-action="'.$this->getAction().'" ';
        $html .= 'data-colorscheme="'.$this->getColorScheme().'" ';
        $html .= 'data-href="'.$this->getHref().'" ';
        $html .= 'data-kid-directed-site="'.$this->getKidDirectedSite().'" ';
        $html .= 'data-layout="'.$this->getLayout().'" ';
        $html .= 'data-ref="'.$this->getRef().'" ';
        $html .= 'data-share="'.$this->getShare().'" ';
        $html .= 'data-show-faces="'.$this->getShowFaces().'" ';
        $html .= 'data-size="'.$this->getSize().'" ';
        $html .= 'data-width="'.$this->getWidth().'" ';
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
        $html .= '<div class="fb-like" ';
        $html .= 'action="'.$this->getAction().'" ';
        $html .= 'colorscheme="'.$this->getColorScheme().'" ';
        $html .= 'href="'.$this->getHref().'" ';
        $html .= 'kid_directed_site="'.$this->getKidDirectedSite().'" ';
        $html .= 'layout="'.$this->getLayout().'" ';
        $html .= 'ref="'.$this->getRef().'" ';
        $html .= 'share="'.$this->getShare().'" ';
        $html .= 'show_faces="'.$this->getShowFaces().'" ';
        $html .= 'size="'.$this->getSize().'" ';
        $html .= 'width="'.$this->getWidth().'" ';
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
     * getAction
     *
     * @return string
     */
    public function getAction()
    {
        return esc_attr($this->action);
    }

    /**
     * getColorScheme
     *
     * @return string
     */
    public function getColorScheme()
    {
        return esc_attr($this->colorScheme);
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
     * getKidDirectedSite
     *
     * @return string
     */
    public function getKidDirectedSite()
    {
        return esc_attr($this->kidDirectedSite);
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
     * getRef
     *
     * @return string
     */
    public function getRef()
    {
        return esc_attr($this->ref);
    }

    /**
     * getShare
     *
     * @return string
     */
    public function getShare()
    {
        return esc_attr($this->share);
    }

    /**
     * getShowFaces
     *
     * @return string
     */
    public function getShowFaces()
    {
        return esc_attr($this->showFaces);
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

    /**
     * getWidth
     *
     * @return int
     */
    public function getWidth()
    {
        return esc_attr($this->width);
    }
}
