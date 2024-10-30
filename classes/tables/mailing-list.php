<?php

/**
 * Class CentralHubbFacebookPluginTablesMailingList
 *
 */
class CentralHubbFacebookPluginTablesMailingList extends \WP_List_Table {

    /** @var CentralHubbFacebookPluginConfig $config */
    public $config = null;

    /** @var string $optionsKey */
    public $optionsKey = 'central_hubb_facebook_plugin_mailing_list';

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
            'setting' => __( 'Question', 'sp' ),
            'value' => __( 'Answer', 'sp' ),
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

        $options  = get_option($this->optionsKey);

        $firstName = !empty($options['first_name']) ? esc_attr($options['first_name']) : null;
        $lastName  = !empty($options['last_name']) ? esc_attr($options['last_name']) : null;
        $email = !empty($options['email']) ? esc_attr($options['email']) : null;
        $countryCode = !empty($options['country_code']) ? esc_attr($options['country_code']) : null;
        $city = !empty($options['city']) ? esc_attr($options['city']) : null;
        $timezone = !empty($options['timezone']) ? esc_attr($options['timezone']) : null;
        $webDevelopmentSkillLevel = !empty($options['web_development_skill_level']) ? esc_attr($options['web_development_skill_level']) : null;
        $graphicDesignSkillLevel = !empty($options['graphic_design_skill_level']) ? esc_attr($options['graphic_design_skill_level']) : null;
        $userSource = !empty($options['user_source']) ? esc_attr($options['user_source']) : null;

        return [
            [
                'setting' => 'First Name',
                'value' => '<input type="text" name="'.$this->optionsKey.'[first_name]" style="width:200px;" value="'.$firstName.'">',
            ],
            [
                'setting' => 'Last Name',
                'value' => '<input type="text" name="'.$this->optionsKey.'[last_name]" style="width:200px;" value="'.$lastName.'">',
            ],
            [
                'setting' => 'Email',
                'value' => '<input type="email" name="'.$this->optionsKey.'[email]" style="width:200px;" value="'.$email.'">',
            ],
            [
                'setting' => 'Country',
                'value' => $this->getCountriesSelect($countryCode),
            ],
            [
                'setting' => 'City',
                'value' => '<input type="text" name="'.$this->optionsKey.'[city]" style="width:200px;" value="'.$city.'">',
            ],
            [
                'setting' => 'Timezone',
                'value' => $this->getTimezonesSelect($timezone),
            ],
            [
                'setting' => 'Web Development Skill Level',
                'value' => $this->getDevelopmentSkillLevelSelect($webDevelopmentSkillLevel),
            ],
            [
                'setting' => 'Graphic Design Skill Level',
                'value' => $this->getGraphicDesignSkillLevelSelect($graphicDesignSkillLevel),
            ],
            [
                'setting' => 'Where did you hear about us?',
                'value' => $this->getWhereDidYouHearAboutUsSelect($userSource),
            ],
            [
                'setting' => '',
                'value' => '<input type="submit" class="button-primary" value="Save" style="float:right;margin-right:10px;">',
            ],
        ];

    }

    /**
     * getCountriesSelect.
     *
     * @param null $selectedValue
     * @return string
     */
    public function getCountriesSelect($selectedValue = null)
    {
        $countries = new CentralHubbFacebookPluginIsoCountries();
        $countries = $countries->getCounties();

        $html = '';
        $html .= '<select name="'.$this->optionsKey.'[country_code]" style="width:200px;">';

        foreach($countries as $countryCode => $countryName) {

            if(empty($selectedValue)) {
                $selectedValue = 'US';
            }

            if($countryCode == $selectedValue) {
                $html .= '<option value="'.$countryCode.'" selected="selected">'.$countryName.'</option>';
            } else {
                $html .= '<option value="'.$countryCode.'">'.$countryName.'</option>';
            }
        }

        $html .= '</select>';
        return $html;
    }

    /**
     * getTimezonesSelect.
     *
     * @param null $selectedValue
     * @return string
     */
    public function getTimezonesSelect($selectedValue = null)
    {
        $timezones = $this->getTimezoneList();

        $html = '';
        $html .= '<select name="'.$this->optionsKey.'[timezone]" style="width:200px;">';

        foreach($timezones as $timezone) {

            if(empty($selectedValue)) {
                $selectedValue = 'America/New_York';
            }

            if($timezone['zone'] == $selectedValue) {
                $html .= '<option value="'.$timezone['zone'].'"  selected="selected">'.str_replace('_', ' ', $timezone['zone']).' ('.$timezone['offset'].')</option>';
            } else {
                $html .= '<option value="'.$timezone['zone'].'">'.str_replace('_', ' ', $timezone['zone']).' ('.$timezone['offset'].')</option>';
            }


        }

        $html .= '</select>';
        return $html;
    }

    /**
     * getTimezoneList.
     *
     * @return array
     */
    public function getTimezoneList() {
        $zones_array = array();
        $timestamp = time();
        foreach(timezone_identifiers_list() as $key => $zone) {
            date_default_timezone_set($zone);
            $zones_array[$key]['zone'] = $zone;
            $zones_array[$key]['offset'] = date('P', $timestamp);
        }
        return $zones_array;
    }

    /**
     * getDevelopmentSkillLevelSelect.
     *
     * @param null $selectedValue
     * @return string
     */
    public function getDevelopmentSkillLevelSelect($selectedValue = null)
    {
        $options = array(
            'beginner' => 'Beginner',
            'basic' => 'Basic',
            'intermediate' => 'Intermediate',
            'advanced' => 'Advanced',
            'expert' => 'Expert',
        );

        $html = '';
        $html .= '<select name="'.$this->optionsKey.'[web_development_skill_level]" style="width:200px;">';

        foreach($options as $key => $label) {

            if($key == $selectedValue) {
                $html .= '<option value="'.$key.'" selected="selected">'.$label.'</option>';
            } else {
                $html .= '<option value="'.$key.'">'.$label.'</option>';
            }
        }

        $html .= '</select>';
        return $html;
    }

    /**
     * getGraphicDesignSkillLevelSelect.
     *
     * @param null $selectedValue
     * @return string
     */
    public function getGraphicDesignSkillLevelSelect($selectedValue = null)
    {
        $options = array(
            'beginner' => 'Beginner',
            'basic' => 'Basic',
            'intermediate' => 'Intermediate',
            'advanced' => 'Advanced',
            'expert' => 'Expert',
        );

        $html = '';
        $html .= '<select name="'.$this->optionsKey.'[graphic_design_skill_level]" style="width:200px;">';

        foreach($options as $key => $label) {
            if($key == $selectedValue) {
                $html .= '<option value="'.$key.'" selected="selected">'.$label.'</option>';
            } else {
                $html .= '<option value="'.$key.'">'.$label.'</option>';
            }
        }

        $html .= '</select>';
        return $html;
    }

    /**
     * getWhereDidYouHearAboutUsSelect.
     *
     * @param null $selectedValue
     * @return string
     */
    public function getWhereDidYouHearAboutUsSelect($selectedValue = null)
    {
        $options = array(
            'not-specified' => 'Not Specified',
            'search-engine' => 'Search Engine',
            'social-network' => 'Social Network',
            'website' => 'Website',
            'wordpress' => 'Wordpress',
            'friend-referral' => 'Friend Referral',
            'other' => 'Other',
        );

        $html = '';
        $html .= '<select name="'.$this->optionsKey.'[user_source]" style="width:200px;">';

        foreach($options as $key => $label) {

            if($key == $selectedValue) {
                $html .= '<option value="'.$key.'" selected="selected">'.$label.'</option>';
            } else {
                $html .= '<option value="'.$key.'">'.$label.'</option>';
            }
        }

        $html .= '</select>';
        return $html;
    }

}


