<?php

/**
 * Class CentralHubbFacebookPluginFormsForm
 */
class CentralHubbFacebookPluginFormsForm {

    /** @var array $data */
    protected $data = [];

    /**
     * CentralHubbBase constructor.
     */
    public function  __construct()
    {
        $this->initData();
    }

    /**
     * initData.
     */
    public function initData()
    {
        $data = [];
        $data = array_merge($data, !empty($_GET) ? $_GET : []);
        $data = array_merge($data, !empty($_POST) ? $_POST : []);
        $this->data = $data;
    }

    /**
     * sanitizeAlphaNumeric.
     *
     * @param $value
     * @return mixed
     */
    public function sanitizeAlphaNumeric($value)
    {
        return preg_replace("/[^A-Za-z0-9-_., #@\/]/", '', $value);
    }

    /**
     * sanitizeAlpha.
     *
     * @param $value
     * @return mixed
     */
    public function sanitizeAlpha($value)
    {
        return preg_replace("/[^A-Za-z-_., #@\/]/", '', $value);
    }

    /**
     * sanitizeNumeric.
     *
     * @param $value
     * @return mixed
     */
    public function sanitizeNumeric($value)
    {
        return preg_replace("/[^0-9]/", '', $value);
    }

    /**
     * sanitizeUrl.
     *
     * @param $value
     * @return mixed
     */
    public function sanitizeUrl($value)
    {
        return esc_url($value);
    }

    /**
     * getSanitizedPost.
     *
     * @return array
     */
    public function getSanitizedPost()
    {
        $post = !empty($_POST) ? $_POST : [];

        if(!empty($post)) {
            foreach($post as $key => $value) {
                $post[$key] = $this->sanitizeAlphaNumeric($value);
            }
        }

        return $post;
    }

    /**
     * getNonce.
     *
     * @return mixed|null
     */
    public function getNonce()
    {
        return !empty($this->data['ch_nonce']) ? $this->sanitizeAlphaNumeric($this->data['ch_nonce']) : null;
    }
}
