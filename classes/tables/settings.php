<?php

/**
 * Class CentralHubbFacebookPluginTablesSettings
 *
 */
class CentralHubbFacebookPluginTablesSettings extends \WP_List_Table {

    /** @var CentralHubbFacebookPluginConfig $config */
    public $config = null;

    /** Class constructor */
    public function __construct() {

        parent::__construct();

        $this->config = new CentralHubbFacebookPluginConfig();

        add_action('admin_head', array($this, 'get_css_styles'));
    }

    /**
     * get_css_styles.
     */
    public function get_css_styles() {
        echo '
        <style type="text/css">
                .tablenav.top {
                    display:none;
                }
                .column-preview_image { text-align: left; width:120px !important;}
                .column-title { text-align: left; width:200px !important; }
                .preview-image {
                    width:120px;
                    height:120px;
                    border:1px solid lightgrey;
                }
                .code-container {
                    background-color:#F5F5F5;
                    border: 1px solid #CCCCCC;
                    -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px;
                    padding:10px;
                }
            </style>
        ';
    }

    /**
     * column_default.
     *
     * @param object $item
     * @param string $column_name
     * @return mixed
     */
    public function column_default( $item, $column_name ) {
        return $item[ $column_name ];
    }

    /**
     * get_columns.
     *
     * @return array
     */
    function get_columns() {

        $columns = [
            'setting' => __( 'Setting', 'sp' ),
            'value' => __( 'Value', 'sp' ),
        ];

        return $columns;
    }

    /**
     * prepare_items
     */
    public function prepare_items() {
        $this->_column_headers = $this->get_column_info();
        $this->items = $this->get_table_results();
    }

    /**
     * get_table_results.
     *
     * @return array
     */
    public function get_table_results() {

        $settingsKey = $this->config->getDbSettingsKey();

        $options  = get_option($settingsKey);

        $appId = isset( $options['app_id'] ) ? $options['app_id'] : null;
        $appSecret = isset( $options['app_secret'] ) ? $options['app_secret'] : null;

        if($this->config->getDemoMode() == true) {
            return [
                [
                    'setting' => 'Application ID',
                    'value' => '<input type="text" name="'.$settingsKey.'[app_id]" style="width:200px;" value="" placeholder="Disabled for demo">',
                ],
                [
                    'setting' => 'Application Secret',
                    'value' => '<input type="text" name="'.$settingsKey.'[app_secret]" style="width:200px;" value="" placeholder="Disabled for demo">',
                ],
                [
                    'setting' => '',
                    'value' => '<input type="submit" class="button-primary" value="Save" style="float:right;margin-right:10px;">',
                ],
            ];
        } else {
            return [
                [
                    'setting' => 'Application ID',
                    'value' => '<input type="text" name="'.$settingsKey.'[app_id]" style="width:200px;" value="'.esc_attr($appId).'">',
                ],
                [
                    'setting' => 'Application Secret',
                    'value' => '<input type="text" name="'.$settingsKey.'[app_secret]" style="width:200px;" value="'.esc_attr($appSecret).'">',
                ],
                [
                    'setting' => '',
                    'value' => '<input type="submit" class="button-primary" value="Save" style="float:right;margin-right:10px;">',
                ],
            ];
        }


    }
}
