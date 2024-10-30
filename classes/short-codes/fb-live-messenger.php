<?php

/**
 * Class CentralHubbFacebookPluginShortCodesFbLiveMessenger
 */
class CentralHubbFacebookPluginShortCodesFbLiveMessenger
{
    /** @var CentralHubbFacebookPluginConfig $config */
    protected $config = null;

    /** @var CentralHubbFacebookPluginFormsForm $form */
    protected $form = null;

    /** @var string $pageId */
    protected $pageId = null;

    /** @var string $themeColor */
    protected $themeColor = null;

    /** @var string $loggedInGreeting */
    protected $loggedInGreeting = null;

    /** @var string $loggedOutGreeting */
    protected $loggedOutGreeting = null;

    /** @var string $greetingDialogDisplay */
    protected $greetingDialogDisplay = null;

    /** @var string $greetingDialogDelay */
    protected $greetingDialogDelay = null;

    /** @var string $ref */
    protected $ref = null;

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
        $class->pageId = !empty($options['page-id']) ? $class->form->sanitizeAlphaNumeric($options['page-id']) : null;
        $class->themeColor = !empty($options['theme-color']) ? $class->form->sanitizeAlphaNumeric($options['theme-color']) : null;
        $class->loggedInGreeting = !empty($options['logged-in-greeting']) ? $class->form->sanitizeAlphaNumeric($options['logged-in-greeting']) : null;
        $class->loggedOutGreeting = !empty($options['logged-out-greeting']) ? $class->form->sanitizeAlphaNumeric($options['logged-out-greeting']) : null;
        $class->greetingDialogDisplay = !empty($options['greeting-dialog-display']) ? $class->form->sanitizeAlphaNumeric($options['greeting-dialog-display']) : null;
        $class->greetingDialogDelay = !empty($options['greeting-dialog-delay']) ? $class->form->sanitizeNumeric($options['greeting-dialog-delay']) : null;
        $class->ref = !empty($options['ref']) ? $class->form->sanitizeAlphaNumeric($options['ref']) : null;

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
        $html .= '<div class="fb-customerchat" ';
        $html .= 'page_id="'.$this->getPageId().'" ';
        $html .= 'data-theme_color="'.$this->getThemeColor().'" ';
        $html .= 'data-logged_in_greeting="'.$this->getLoggedInGreeting().'" ';
        $html .= 'data-logged_out_greeting="'.$this->getLoggedOutGreeting().'" ';
        $html .= 'data-greeting_dialog_display="'.$this->getGreetingDialogDisplay().'" ';
        $html .= 'data-greeting_dialog_delay="'.$this->getGreetingDialogDelay().'" ';
        $html .= 'data-ref="'.$this->getRef().'" ';
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
        $html .= '<div class="fb-customerchat" ';
        $html .= 'page_id="'.$this->getPageId().'" ';
        $html .= 'theme_color="'.$this->getThemeColor().'" ';
        $html .= 'logged_in_greeting="'.$this->getLoggedInGreeting().'" ';
        $html .= 'logged_out_greeting="'.$this->getLoggedOutGreeting().'" ';
        $html .= 'greeting_dialog_display="'.$this->getGreetingDialogDisplay().'" ';
        $html .= 'greeting_dialog_delay="'.$this->getGreetingDialogDelay().'" ';
        $html .= 'ref="'.$this->getRef().'" ';
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
     * getPageId
     *
     * @return string
     */
    public function getPageId()
    {
        return esc_attr($this->pageId);
    }

    /**
     * getThemeColor
     *
     * @return string
     */
    public function getThemeColor()
    {
        return esc_attr($this->themeColor);
    }

    /**
     * getLoggedInGreeting
     *
     * @return string
     */
    public function getLoggedInGreeting()
    {
        return esc_attr($this->loggedInGreeting);
    }

    /**
     * getLoggedOutGreeting
     *
     * @return string
     */
    public function getLoggedOutGreeting()
    {
        return esc_attr($this->loggedOutGreeting);
    }

    /**
     * getGreetingDialogDisplay
     *
     * @return string
     */
    public function getGreetingDialogDisplay()
    {
        return esc_attr($this->greetingDialogDisplay);
    }

    /**
     * getGreetingDialogDelay
     *
     * @return string
     */
    public function getGreetingDialogDelay()
    {
        return esc_attr($this->greetingDialogDelay);
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
}
