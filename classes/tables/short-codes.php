<?php

/**
 * Class CentralHubbFacebookPluginTablesShortCodes
 *
 */
class CentralHubbFacebookPluginTablesShortCodes extends \WP_List_Table {
    
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
            'preview_image' => __( 'Preview Image', 'sp' ),
            'title' => __( 'Title', 'sp' ),
            'description' => __( 'Description', 'sp' ),
            'short_code_generate' => __( 'Generate Shortcode', 'sp' ),
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

        add_thickbox();

        $options = get_option('central_hubb_facebook_settings');
        $appId = !empty($options['app_id']) ? $options['app_id'] : null;

        return [
            [
                'preview_image' => '<div class="preview-image" style="background-image:url(\''.$this->config->getPluginPathUrl().'img/previews/fb-sdk.png\');background-size: 200px;"></div>',
                'title' => 'Facebook SDK (fb-root)',
                'description' => 'Include the JavaScript SDK on your page once, ideally right after the opening body tag.',
                'short_code_generate' => '<a class="button button-info" href="'.get_admin_url(null,'admin.php?page=facebook-embeds-javascript-sdk').'">Generate Shortcode</a>',
            ],
            [
                'preview_image' => '<div class="preview-image" style="background-image:url(\''.$this->config->getPluginPathUrl().'img/previews/fb-messenger.png\');background-size: 200px;"></div>',
                'title' => 'Live Messenger (beta)',
                'description' => 'The Messenger Platform\'s customer chat plugin allows you to integrate your Messenger experience directly into your website. This allows your customers to interact with your business anytime with the same personalized, rich-media experience they get in Messenger.',
                'short_code_generate' => '<a class="button button-info" href="'.get_admin_url(null,'admin.php?page=facebook-embeds-live-messenger').'">Generate Shortcode</a>',
            ],
            [
                'preview_image' => '<div class="preview-image" style="background-image:url(\''.$this->config->getPluginPathUrl().'img/previews/fb-comments.png\');background-size: 250px;"></div>',
                'title' => 'Comments',
                'description' => 'The comments plugin lets people comment on content on your site using their Facebook account. People can choose to share their comment activity with their friends (and friends of their friends) on Facebook as well. The comments plugin also includes built-in moderation tools and social relevance ranking.',
                'short_code_generate' => '<a class="button button-info" href="'.get_admin_url(null,'admin.php?page=facebook-embeds-comments').'">Generate Shortcode</a>',
            ],
            [
                'preview_image' => '<div class="preview-image" style="background-image:url(\''.$this->config->getPluginPathUrl().'img/previews/fb-embedded-comment.png\');background-size: 450px;"></div>',
                'title' => 'Embedded Comment',
                'description' => 'Embedded comments are a simple way to put public post comments - by a Page or a person on Facebook - into the content of your web site or web page. Only public comments from Facebook Pages and profiles can be embedded.',
                'short_code_generate' => '<a class="button button-info" href="'.get_admin_url(null,'admin.php?page=facebook-embeds-embedded-comment').'">Generate Shortcode</a>',
            ],
            [
                'preview_image' => '<div class="preview-image" style="background-image:url(\''.$this->config->getPluginPathUrl().'img/previews/fb-embedded-post.png\');background-size: 200px;"></div>',
                'title' => 'Embedded Post',
                'description' => 'Embedded Posts are a simple way to put public posts - by a Page or a person on Facebook - into the content of your web site or web page. Only public posts from Facebook Pages and profiles can be embedded.',
                'short_code_generate' => '<a class="button button-info" href="'.get_admin_url(null,'admin.php?page=facebook-embeds-embedded-post').'">Generate Shortcode</a>',
            ],
            [
                'preview_image' => '<div class="preview-image" style="background-image:url(\''.$this->config->getPluginPathUrl().'img/previews/fb-embedded-video.png\');background-size: 210px;"></div>',
                'title' => 'Embedded Video',
                'description' => 'With the embedded video player you can easily add Facebook videos and Facebook live videos to your website. You can use any public video post by a Page or a person as video or live video source.',
                'short_code_generate' => '<a class="button button-info" href="'.get_admin_url(null,'admin.php?page=facebook-embeds-embedded-video').'">Generate Shortcode</a>',
            ],
            [
                'preview_image' => '<div class="preview-image" style="background-image:url(\''.$this->config->getPluginPathUrl().'img/previews/fb-embedded-group.png\');background-size: 150px;"></div>',
                'title' => 'Group Plugin',
                'description' => 'The Group Plugins lets people join your Facebook group from a link in an email message or a web page.',
                'short_code_generate' => '<a class="button button-info" href="'.get_admin_url(null,'admin.php?page=facebook-embeds-group-plugin').'">Generate Shortcode</a>',
            ],
            [
                'preview_image' => '<div class="preview-image" style="background-image:url(\''.$this->config->getPluginPathUrl().'img/previews/fb-like-button.png\');background-size: 410px;"></div>',
                'title' => 'Like Button',
                'description' => 'A single click on the Like button will \'like\' pieces of content on the web and share them on Facebook. You can also display a Share button next to the Like button to let people add a personal message and customize who they share with.',
                'short_code_generate' => '<a class="button button-info" href="'.get_admin_url(null,'admin.php?page=facebook-embeds-like-button').'">Generate Shortcode</a>',
            ],
            [
                'preview_image' => '<div class="preview-image" style="background-image:url(\''.$this->config->getPluginPathUrl().'img/previews/fb-page-plugin.png\');background-size: 120px;"></div>',
                'title' => 'Page Plugin',
                'description' => 'The Page plugin lets you easily embed and promote any public Facebook Page on your website. Just like on Facebook, your visitors can like and share the Page without leaving your site.',
                'short_code_generate' => '<a class="button button-info" href="'.get_admin_url(null,'admin.php?page=facebook-embeds-page-plugin').'">Generate Shortcode</a>',
            ],
            [
                'preview_image' => '<div class="preview-image" style="background-image:url(\''.$this->config->getPluginPathUrl().'img/previews/fb-quote-plugin.png\');background-size: 200px;background-repeat:no-repeat;background-color:white;background-position-y: 10px;background-position-x: -30px;"></div>',
                'title' => 'Quote Plugin',
                'description' => 'The quote plugin lets people select text on your page and add it to their share, so they can tell a more expressive story.',
                'short_code_generate' => '<a class="button button-info" href="'.get_admin_url(null,'admin.php?page=facebook-embeds-quote-plugin').'">Generate Shortcode</a>',
            ],
            [
                'preview_image' => '<div class="preview-image" style="background-image:url(\''.$this->config->getPluginPathUrl().'img/previews/fb-save-button.png\');background-size: 150px;background-repeat:no-repeat;background-color:white;background-position-y: 30px;"></div>',
                'title' => 'Save Button',
                'description' => 'The Save button lets people save items or services to a private list on Facebook, share it with friends, and receive relevant notifications. For example, a person can save an item of clothing, trip, or link that they\'re thinking about and go back to that list for future consumption, or get notified when that item or trip has a promotional deal.',
                'short_code_generate' => '<a class="button button-info" href="'.get_admin_url(null,'admin.php?page=facebook-embeds-save-button').'">Generate Shortcode</a>',
            ],
            [
                'preview_image' => '<div class="preview-image" style="background-image:url(\''.$this->config->getPluginPathUrl().'img/previews/fb-share-button.png\');background-size: 100px;background-repeat:no-repeat;background-color:white;background-position-y: 15px;background-position-x: 10px;"></div>',
                'title' => 'Share Button',
                'description' => 'The Share button lets people add a personalized message to links before sharing on their timeline, in groups, or to their friends via a Facebook Message.',
                'short_code_generate' => '<a class="button button-info" href="'.get_admin_url(null,'admin.php?page=facebook-embeds-share-button').'">Generate Shortcode</a>',
            ],
        ];
    }

}


