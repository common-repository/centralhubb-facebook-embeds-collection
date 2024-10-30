<?php

/**
 * Class CentralHubbFacebookPluginShortCodesFbComments
 */
class CentralHubbFacebookPluginShortCodesFbComments
{
    /** @var CentralHubbFacebookPluginConfig $config */
    protected $config = null;

    /** @var CentralHubbFacebookPluginFormsForm $form */
    protected $form = null;

    /** @var string $colorScheme */
    protected $colorScheme = null;

    /** @var string $href */
    protected $href = null;

    /** @var string $mobile */
    protected $mobile = null;

    /** @var string $numPosts */
    protected $numPosts = null;

    /** @var string $orderBy */
    protected $orderBy = null;

    /** @var string $width */
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
        $class->colorScheme = !empty($options['color-scheme']) ? $class->form->sanitizeAlpha($options['color-scheme']) : null;
        $class->href = !empty($options['href']) ? $class->form->sanitizeUrl($options['href']) : null;
        $class->mobile = !empty($options['mobile']) ? $class->form->sanitizeAlpha($options['mobile']) : null;
        $class->numPosts = !empty($options['num-posts']) ? $class->form->sanitizeNumeric($options['num-posts']) : null;
        $class->orderBy = !empty($options['order-by']) ? $class->form->sanitizeAlpha($options['order-by']) : null;
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
        $html .= '<div style="width:'.$this->getWidth().'px"><div class="fb-comments" ';

        $html .= 'data-colorscheme="'.$this->getColorScheme().'" ';
        $html .= 'data-href="'.$this->getHref().'" ';

        if($this->getMobile() == 'true') {
            $html .= 'data-mobile="'.$this->getMobile().'" ';
        }

        $html .= 'data-numposts="'.$this->getNumPosts().'" ';
        $html .= 'data-order-by="'.$this->getOrderBy().'" ';
        $html .= 'data-width="'.$this->getWidth().'" ';

        $html .= '></div></div>';

        return $html;
    }

    /**
     * get_short_code_html4.
     *
     * @return string
     */
    public function get_short_code_html4() {
        $html = '';
        $html .= '<div style="width:'.$this->getWidth().'px"><div class="fb-comments" ';

        $html .= 'colorscheme="'.$this->getColorScheme().'" ';
        $html .= 'href="'.$this->getHref().'" ';

        if($this->getMobile() == 'true') {
            $html .= 'mobile="'.$this->getMobile().'" ';
        }

        $html .= 'num_posts="'.$this->getNumPosts().'" ';
        $html .= 'order_by="'.$this->getOrderBy().'" ';
        $html .= 'width="'.$this->getWidth().'" ';

        $html .= '></div></div>';

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
     * getMobile
     *
     * @return string
     */
    public function getMobile()
    {
        return esc_attr($this->mobile);
    }

    /**
     * getNumPosts
     *
     * @return string
     */
    public function getNumPosts()
    {
        return esc_attr($this->numPosts);
    }

    /**
     * getOrderBy
     *
     * @return string
     */
    public function getOrderBy()
    {
        return esc_attr($this->orderBy);
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
}