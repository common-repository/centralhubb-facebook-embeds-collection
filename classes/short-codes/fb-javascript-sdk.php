<?php

/**
 * Class CentralHubbFacebookPluginShortCodesFbJavascriptSdk
 */
class CentralHubbFacebookPluginShortCodesFbJavascriptSdk
{
    /** @var CentralHubbFacebookPluginConfig $config */
    protected $config = null;

    /** @var CentralHubbFacebookPluginFormsForm $form */
    protected $form = null;

    /** @var string $appId */
    protected $appId = null;

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
        $class->appId = !empty($options['app_id']) ? $class->form->sanitizeAlphaNumeric($options['app_id']) : '';
        return $class->get_short_code_html();
    }

    /**
     * get_short_code.
     *
     * @return string
     */
    public function get_short_code_html() {
        $html = '';
        $html .= '<div id="fb-root"></div>'."\n";
        $html .= '<script type="text/javascript">'."\n";
        $html .= "\t".'window.fbAsyncInit = function() {'."\n";
        $html .= "\t\t".'FB.init({'."\n";
        $html .= "\t\t\t".'appId            : \''.$this->getAppId().'\','."\n";
        $html .= "\t\t\t".'autoLogAppEvents : true,'."\n";
        $html .= "\t\t\t".'xfbml            : true,'."\n";
        $html .= "\t\t\t".'version          : \'v3.0\''."\n";
        $html .= "\t\t".'});'."\n";
        $html .= "\t".'};'."\n";
        $html .= "\t".'(function(d, s, id){'."\n";
        $html .= "\t".'var js, fjs = d.getElementsByTagName(s)[0];'."\n";
        $html .= "\t".'if (d.getElementById(id)) {return;}'."\n";
        $html .= "\t".'js = d.createElement(s); js.id = id;'."\n";
        $html .= "\t".'js.src = "https://connect.facebook.net/en_US/sdk.js";'."\n";
        $html .= "\t".'fjs.parentNode.insertBefore(js, fjs);'."\n";
        $html .= "\t".'}(document, \'script\', \'facebook-jssdk\'));'."\n";
        $html .= '</script>'."\n";
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
     * getAppId
     *
     * @return string
     */
    public function getAppId()
    {
        return esc_attr($this->appId);
    }

    /**
     * setAppId
     *
     * @param string $appId
     */
    public function setAppId(string $appId)
    {
        $this->appId = $appId;
    }
}
