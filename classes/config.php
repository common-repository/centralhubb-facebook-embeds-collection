<?php

/**
 * Class CentralHubbFacebookPluginConfig
 */
class CentralHubbFacebookPluginConfig {

    /** @var string $pluginPathUrl */
    public $pluginPathUrl = null;

    /** @var string $pluginPathRoot */
    public $pluginPathRoot = null;

    /** @var string $dbSettingsKey */
    public $dbSettingsKey = 'central_hubb_facebook_settings';

    /** @var string $shortCodeFormat */
    public $shortCodeFormat = 'html5'; // you can select html5 or html4 shortcode output

    /** @var string $shortCodePrefix */
    public $shortCodePrefix = 'facebook'; // you can select any shortcode prefix you want

    /** @var bool $demoMode */
    public $demoMode = false;

    /**
     * CentralHubbFacebookPluginConfig constructor.
     */
    public function __construct()
    {
        /** @var string pluginUrlPublic */
        $this->pluginPathUrl = str_replace('classes/' , '', plugin_dir_url(__FILE__));

        /** @var string pluginPathRoot */
        $this->pluginPathRoot = realpath(__DIR__.'/../').'/';
    }

    /**
     * getPluginPathUrl
     *
     * @return string
     */
    public function getPluginPathUrl()
    {
        return esc_attr($this->pluginPathUrl);
    }

    /**
     * getPluginPathRoot
     *
     * @return string
     */
    public function getPluginPathRoot()
    {
        return esc_attr($this->pluginPathRoot);
    }

    /**
     * getDbSettingsKey
     *
     * @return string
     */
    public function getDbSettingsKey()
    {
        return esc_attr($this->dbSettingsKey);
    }

    /**
     * getDemoMode
     *
     * @return bool
     */
    public function getDemoMode()
    {
        return $this->demoMode;
    }

    /**
     * getShortCodeFormat
     *
     * @return string
     */
    public function getShortCodeFormat()
    {
        return esc_attr($this->shortCodeFormat);
    }

    /**
     * getShortCodePrefix
     *
     * @return string
     */
    public function getShortCodePrefix()
    {
        return esc_attr($this->shortCodePrefix);
    }
}
