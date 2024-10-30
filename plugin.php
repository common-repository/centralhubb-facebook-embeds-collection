<?php

/*
Plugin Name: Facebook Embeds Collection Plugin
Plugin URI: https://github.com/central-hubb/facebook-embeds-collection
Description: This plugin contains generators for all of the facebook official embed plugins and converts them to wordpress short codes
Version: 1.6.17
Author: iflickle
Author URI:  https://profiles.wordpress.org/iflickle
*/

if ( ! class_exists( 'WP_List_Table' ) ) {
    $adminPath = str_replace( get_bloginfo( 'url' ) . '/', ABSPATH, get_admin_url() );
    require_once( $adminPath . 'includes/class-wp-list-table.php' );
}

function require_all_classes_directory()
{
    $directory = new \RecursiveDirectoryIterator(__DIR__.'/classes');
    $iterator = new \RecursiveIteratorIterator($directory);
    foreach ($iterator as $info) {
        $filename = $info->getPathname();
        $explode = explode('/', $filename);

        if(!in_array(end($explode), ['.', '..'])) {
            require_once($info->getPathname());
        }
    }
}
require_all_classes_directory();

/**
 * Class CentralHubbFacebookPlugin
 */
class CentralHubbFacebookPlugin extends CentralHubbFacebookPluginFormsForm {

    /** @var CentralHubbFacebookPluginConfig $config */
    public $config;

    /** @var string $pageTitle */
    public $pageTitle = '';

    /** @var string $tableWidth */
    public $tableWidth = '1100px';

    /** @var CentralHubbFacebookPluginTablesSettings tableObject */
    public $tableObject;

    /** @var string $formId */
    public $formId = null;

    /** @var array $options */
    public $options = [];

    /** @var string $optionsKey */
    public $optionsKey = null;

    /** @var string $savedMessage */
    public $savedMessage = null;

    /**
     * Facebook_Plugin constructor.
     */
    public function __construct() {

        parent::__construct();

        $this->config = new CentralHubbFacebookPluginConfig();

        add_action( 'admin_menu', [ $this, 'admin_menu' ] );

        $this->initShortCodes();
        $this->initDemoMode();
    }

    /**
     * admin_menu
     */
    public function admin_menu() {

        // facebook embeds
        $hook = add_menu_page(
            'Facebook Embeds',
            'Facebook Embed',
            'manage_options',
            'facebook-embeds-collection',
            [ $this, 'get_page' ]
        );

        add_action( "load-$hook", [ $this, 'short_codes_table_object' ] );

        if(current_user_can('administrator')) {

            $hook = add_submenu_page(
                'facebook-embeds-collection',
                'Facebook Settings',
                'Facebook Settings',
                'manage_options',
                'facebook-embeds-settings',
                [$this, 'get_page']
            );

            add_action("load-$hook", [$this, 'settings_table_object']);

            $hook = add_submenu_page(
                'facebook-embeds-collection',
                'Facebook SDK',
                'Facebook SDK',
                'manage_options',
                'facebook-embeds-javascript-sdk',
                [$this, 'get_page']
            );

            add_action("load-$hook", [$this, 'settings_table_object']);

            $hook = add_submenu_page(
                'facebook-embeds-collection',
                'Live Messenger',
                'Live Messenger',
                'manage_options',
                'facebook-embeds-live-messenger',
                [$this, 'get_page']
            );

            add_action("load-$hook", [$this, 'settings_table_object']);

            $hook = add_submenu_page(
                'facebook-embeds-collection',
                'Like Button',
                'Like Button',
                'manage_options',
                'facebook-embeds-like-button',
                [$this, 'get_page']
            );

            add_action("load-$hook", [$this, 'settings_table_object']);

            $hook = add_submenu_page(
                'facebook-embeds-collection',
                'Share Button',
                'Share Button',
                'manage_options',
                'facebook-embeds-share-button',
                [$this, 'get_page']
            );

            add_action("load-$hook", [$this, 'settings_table_object']);

            $hook = add_submenu_page(
                'facebook-embeds-collection',
                'Save Button',
                'Save Button',
                'manage_options',
                'facebook-embeds-save-button',
                [$this, 'get_page']
            );

            add_action("load-$hook", [$this, 'settings_table_object']);

            $hook = add_submenu_page(
                'facebook-embeds-collection',
                'Comments',
                'Comments',
                'manage_options',
                'facebook-embeds-comments',
                [$this, 'get_page']
            );

            add_action("load-$hook", [$this, 'settings_table_object']);

            $hook = add_submenu_page(
                'facebook-embeds-collection',
                'Embedded Comment',
                'Embedded Comment',
                'manage_options',
                'facebook-embeds-embedded-comment',
                [$this, 'get_page']
            );

            add_action("load-$hook", [$this, 'settings_table_object']);

            $hook = add_submenu_page(
                'facebook-embeds-collection',
                'Embedded Post',
                'Embedded Post',
                'manage_options',
                'facebook-embeds-embedded-post',
                [$this, 'get_page']
            );

            add_action("load-$hook", [$this, 'settings_table_object']);

            $hook = add_submenu_page(
                'facebook-embeds-collection',
                'Embedded Video',
                'Embedded Video',
                'manage_options',
                'facebook-embeds-embedded-video',
                [$this, 'get_page']
            );

            add_action("load-$hook", [$this, 'settings_table_object']);

            $hook = add_submenu_page(
                'facebook-embeds-collection',
                'Page Plugin',
                'Page Plugin',
                'manage_options',
                'facebook-embeds-page-plugin',
                [$this, 'get_page']
            );

            add_action("load-$hook", [$this, 'settings_table_object']);

            $hook = add_submenu_page(
                'facebook-embeds-collection',
                'Group Plugin',
                'Group Plugin',
                'manage_options',
                'facebook-embeds-group-plugin',
                [$this, 'get_page']
            );

            add_action("load-$hook", [$this, 'settings_table_object']);

            $hook = add_submenu_page(
                'facebook-embeds-collection',
                'Quote Plugin',
                'Quote Plugin',
                'manage_options',
                'facebook-embeds-quote-plugin',
                [$this, 'get_page']
            );

            add_action("load-$hook", [$this, 'settings_table_object']);
        }

//        // refer a friend
//        $hook = add_submenu_page(
//            'facebook-embeds-collection',
//            'Video Tutorials',
//            'Video Tutorials',
//            'manage_options',
//            'facebook-embeds-video-tutorials',
//            [$this, 'get_page']
//        );
//
//        add_action("load-$hook", [$this, 'video_tutorials_table_object']);

        // mailing list
        $hook = add_submenu_page(
            'facebook-embeds-collection',
            'Mailing List',
            'Mailing List',
            'manage_options',
            'facebook-embeds-mailing-list',
            [$this, 'get_page']
        );

        add_action("load-$hook", [$this, 'mailing_list_table_object']);

        // refer a friend
        $hook = add_submenu_page(
            'facebook-embeds-collection',
            'Refer a friend',
            'Refer a friend',
            'manage_options',
            'facebook-embeds-refer-a-friend',
            [$this, 'get_page']
        );

        add_action("load-$hook", [$this, 'refer_a_friend_table_object']);

        // refer a friend
        $hook = add_submenu_page(
            'facebook-embeds-collection',
            'Contribute Code',
            'Contribute Code',
            'manage_options',
            'facebook-embeds-contribute-code',
            [$this, 'get_page']
        );

        add_action("load-$hook", [$this, 'refer_a_friend_table_object']);
    }

    /**
     * initShortCodes.
     */
    public function initShortCodes()
    {
        add_shortcode( $this->config->getShortCodePrefix().'-javascript-sdk', array( 'CentralHubbFacebookPluginShortCodesFbJavascriptSdk', 'get_short_code' ));
        add_shortcode( $this->config->getShortCodePrefix().'-live-messenger', array( 'CentralHubbFacebookPluginShortCodesFbLiveMessenger', 'get_short_code' ));
        add_shortcode( $this->config->getShortCodePrefix().'-comments', array( 'CentralHubbFacebookPluginShortCodesFbComments', 'get_short_code' ));
        add_shortcode( $this->config->getShortCodePrefix().'-embedded-comment', array( 'CentralHubbFacebookPluginShortCodesFbEmbeddedComment', 'get_short_code' ));
        add_shortcode( $this->config->getShortCodePrefix().'-embedded-post', array( 'CentralHubbFacebookPluginShortCodesFbEmbeddedPost', 'get_short_code' ));
        add_shortcode( $this->config->getShortCodePrefix().'-embedded-video', array( 'CentralHubbFacebookPluginShortCodesFbEmbeddedVideo', 'get_short_code' ));
        add_shortcode( $this->config->getShortCodePrefix().'-group-plugin', array( 'CentralHubbFacebookPluginShortCodesFbGroupPlugin', 'get_short_code' ));
        add_shortcode( $this->config->getShortCodePrefix().'-like-button', array( 'CentralHubbFacebookPluginShortCodesFbLikeButton', 'get_short_code' ));
        add_shortcode( $this->config->getShortCodePrefix().'-page-plugin', array( 'CentralHubbFacebookPluginShortCodesFbPagePlugin', 'get_short_code' ));
        add_shortcode( $this->config->getShortCodePrefix().'-quote-plugin', array( 'CentralHubbFacebookPluginShortCodesFbQuotePlugin', 'get_short_code' ));
        add_shortcode( $this->config->getShortCodePrefix().'-save-button', array( 'CentralHubbFacebookPluginShortCodesFbSaveButton', 'get_short_code' ));
        add_shortcode( $this->config->getShortCodePrefix().'-share-button', array( 'CentralHubbFacebookPluginShortCodesFbShareButton', 'get_short_code' ));
    }

    /**
     * settings_table_object.
     */
    public function settings_table_object() {
        if(current_user_can('administrator')) {
            $this->pageTitle = 'Facebook Settings';
            $this->tableWidth = '300px';
            $this->tableObject = new CentralHubbFacebookPluginTablesSettings();
            $this->optionsKey = 'central_hubb_facebook_settings';
            $this->savedMessage = 'Your Facebook settings have been saved.';
            $this->formId = 'settings_form';
        }
    }

    /**
     * short_codes_table_object.
     */
    public function short_codes_table_object() {
        $this->pageTitle = 'Facebook Embeds';
        $this->tableObject = new CentralHubbFacebookPluginTablesShortCodes();
        $this->optionsKey = 'central_hubb_facebook_plugin_short_codes';
    }

    /**
     * mailing_list_table_object.
     */
    public function mailing_list_table_object() {
        $this->pageTitle = 'Plugin Mailing List';
        $this->tableWidth = '300px';
        $this->tableObject = new CentralHubbFacebookPluginTablesMailingList();
        $this->optionsKey = 'central_hubb_facebook_plugin_mailing_list';
        $this->savedMessage = 'You have been successfully added to the Mailing list.';
        $this->formId = 'mailing_list_form';
    }

    /**
     * refer_a_friend_table_object.
     */
    public function refer_a_friend_table_object() {
        $this->pageTitle = 'Refer a friend';
        $this->tableWidth = '300px';
        $this->tableObject = new CentralHubbFacebookPluginTablesReferAFriend();
        $this->optionsKey = 'central_hubb_facebook_plugin_refer_a_friend';
        $this->savedMessage = 'A Message has been sent to your friend.';
        $this->formId = 'refer_a_friend_form';
    }

    /**
     * video_tutorials_table_object.
     */
    public function video_tutorials_table_object() {
        $this->pageTitle = 'Video Tutorials';
        $this->tableObject = new CentralHubbFacebookPluginTablesVideoTutorials();
        $this->optionsKey = 'central_hubb_facebook_plugin_video_tutorials';
    }

    /**
     * settings_page.
     */
    public function get_page() {

        ?>
        <style type="text/css">
            #wpfooter {
                display:none;
            }
        </style>

        <?php

        $options = get_option($this->config->getDbSettingsKey());
        $appId = !empty($options['app_id']) ? $options['app_id'] : null;

        echo CentralHubbFacebookPluginShortCodesFbJavascriptSdk::get_short_code(array('app_id' => $appId));

        if(current_user_can('administrator')) {

            $page = !empty($_GET['page']) ? $_GET['page'] : null;

            switch($page)
            {
                case 'facebook-embeds-javascript-sdk':
                    require_once $this->config->getPluginPathRoot().'pages/fb-javascript-sdk.php';
                    break;

                case 'facebook-embeds-live-messenger':
                    require_once $this->config->getPluginPathRoot().'pages/fb-live-messenger.php';
                    break;

                case 'facebook-embeds-comments':
                    require_once $this->config->getPluginPathRoot().'pages/fb-comments.php';
                    break;

                case 'facebook-embeds-embedded-comment':
                    require_once $this->config->getPluginPathRoot().'pages/fb-embedded-comment.php';
                    break;

                case 'facebook-embeds-embedded-post':
                    require_once $this->config->getPluginPathRoot().'pages/fb-embedded-post.php';
                    break;

                case 'facebook-embeds-embedded-video':
                    require_once $this->config->getPluginPathRoot().'pages/fb-embedded-video.php';
                    break;

                case 'facebook-embeds-group-plugin':
                    require_once $this->config->getPluginPathRoot().'pages/fb-group-plugin.php';
                    break;

                case 'facebook-embeds-like-button':
                    require_once $this->config->getPluginPathRoot().'pages/fb-like-button.php';
                    break;

                case 'facebook-embeds-page-plugin':
                    require_once $this->config->getPluginPathRoot().'pages/fb-page-plugin.php';
                    break;

                case 'facebook-embeds-quote-plugin':
                    require_once $this->config->getPluginPathRoot().'pages/fb-quote-plugin.php';
                    break;

                case 'facebook-embeds-save-button':
                    require_once $this->config->getPluginPathRoot().'pages/fb-save-button.php';
                    break;

                case 'facebook-embeds-share-button':
                    require_once $this->config->getPluginPathRoot().'pages/fb-share-button.php';
                    break;

                case 'facebook-embeds-contribute-code':
                    require_once $this->config->getPluginPathRoot().'pages/contribute-code.php';
                    break;

                default:
                    $this->get_page_table($page);
            }
        }
    }

    /**
     * get_page_table.
     *
     * @param $page
     */
    public function get_page_table($page)
    {
        if (!empty($_POST)) {
            if (!($this->getNonce()) || !wp_verify_nonce($this->getNonce(), $this->optionsKey)) {
                print 'Sorry, your nonce did not verify.';
                exit;
            }
        }

        if (!empty($this->data[$this->optionsKey])) {

            foreach ($this->data[$this->optionsKey] as $key => $value) {

                $this->data[$this->optionsKey][$key] = $this->sanitizeAlphaNumeric($value);
                update_option($this->optionsKey, $this->data[$this->optionsKey]);

            }


            if(in_array($page, ['facebook-embeds-settings'])) {
                ?>
                <script type="text/javascript">
                    jQuery(document).ready(function ($)
                    {
                        $('#form-message-placeholder').append('<div class="notice notice-success is-dismissible" style="margin-top:10px;margin-bottom:0;font-weight:normal;">\n' +
                            '<p><?php echo $this->savedMessage; ?></p>\n' +
                            '</div>');
                    });
                </script>
                <?php
            }

        }

        $this->options = get_option($this->optionsKey);

        ?>
        <div class="wrap">
            <table>
                <tr>
                    <td style="vertical-align: middle;">
                        <img src="<?php echo $this->config->getPluginPathUrl(); ?>/img/social-icons/facebook.png"
                             style="width:50px;">
                    </td>
                    <td style="vertical-align: middle;">
                        <h2>
                            <?php echo $this->pageTitle; ?>
                            <div id="form-message-placeholder"></div>
                        </h2>
                    </td>
                </tr>
            </table>

            <div style="max-width:<?php echo $this->tableWidth; ?>;">
                <div id="post-body" class="metabox-holder columns-2">
                    <div id="post-body-content">
                        <div class="meta-box-sortables ui-sortable">
                            <form id="<?php echo $this->formId; ?>" method="post"
                                  action="<?php echo admin_url('admin.php?page='.$page); ?>">
                                <?php wp_nonce_field($this->optionsKey, 'ch_nonce'); ?>
                                <?php
                                $this->tableObject->prepare_items();
                                $this->tableObject->display(); ?>
                            </form>
                        </div>
                    </div>
                </div>
                <br class="clear">
            </div>
        </div>

        <script type="text/javascript">
            <?php echo file_get_contents($this->config->getpluginPathRoot().'js/admin/forms.js'); ?>
        </script>

        <?php
    }

    /**
     * initDemoMode.
     */
    public function initDemoMode()
    {

        if($this->config->getDemoMode() === true) {
            add_action( 'admin_menu', 'remove_admin_menus' );
            add_action( 'admin_menu', 'remove_admin_submenus' );

            //Remove top level admin menus
            function remove_admin_menus() {
                remove_menu_page( 'index.php' );
                remove_menu_page( 'edit-comments.php' );
                remove_menu_page( 'link-manager.php' );
                remove_menu_page( 'tools.php' );
                remove_menu_page( 'plugins.php' );
                remove_menu_page( 'users.php' );
                remove_menu_page( 'options-general.php' );
                remove_menu_page( 'upload.php' );
                remove_menu_page( 'edit.php' );
                remove_menu_page( 'edit.php?post_type=page' );
                remove_menu_page( 'themes.php' );
            }

            //Remove sub level admin menus
            function remove_admin_submenus() {
                remove_submenu_page( 'themes.php', 'theme-editor.php' );
                remove_submenu_page( 'themes.php', 'themes.php' );
                remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
                remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
                remove_submenu_page( 'edit.php', 'post-new.php' );
                remove_submenu_page( 'themes.php', 'nav-menus.php' );
                remove_submenu_page( 'themes.php', 'widgets.php' );
                remove_submenu_page( 'themes.php', 'theme-editor.php' );
                remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
                remove_submenu_page( 'plugins.php', 'plugin-install.php' );
                remove_submenu_page( 'users.php', 'users.php' );
                remove_submenu_page( 'users.php', 'user-new.php' );
                remove_submenu_page( 'upload.php', 'media-new.php' );
                remove_submenu_page( 'options-general.php', 'options-writing.php' );
                remove_submenu_page( 'options-general.php', 'options-discussion.php' );
                remove_submenu_page( 'options-general.php', 'options-reading.php' );
                remove_submenu_page( 'options-general.php', 'options-discussion.php' );
                remove_submenu_page( 'options-general.php', 'options-media.php' );
                remove_submenu_page( 'options-general.php', 'options-privacy.php' );
                remove_submenu_page( 'options-general.php', 'options-permalinks.php' );
                remove_submenu_page( 'index.php', 'update-core.php' );
            }

            add_action( 'admin_bar_menu', 'remove_my_account', 999 );
            function remove_my_account( $wp_admin_bar ) {
                $wp_admin_bar->remove_node( 'my-account' );
            }

            function remove_admin_bar_links() {
                global $wp_admin_bar;
                $wp_admin_bar->remove_menu('wp-logo');          // Remove the Wordpress logo
                $wp_admin_bar->remove_menu('about');            // Remove the about Wordpress link
                $wp_admin_bar->remove_menu('wporg');            // Remove the Wordpress.org link
                $wp_admin_bar->remove_menu('documentation');    // Remove the Wordpress documentation link
                $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
                $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
                $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
                $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
                $wp_admin_bar->remove_menu('updates');          // Remove the updates link
                $wp_admin_bar->remove_menu('comments');         // Remove the comments link
                $wp_admin_bar->remove_menu('new-content');      // Remove the content link
                $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
                $wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
            }
            add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
        }
    }
}


add_action( 'plugins_loaded', function () {
    new CentralHubbFacebookPlugin();
} );

add_action( 'upgrader_process_complete', 'central_hubb_upgrade_function', 10, 2);

function central_hubb_upgrade_function( $upgrader_object, $options ) {
    $current_plugin_path_name = plugin_basename( __FILE__ );

    if ($options['action'] == 'update' && $options['type'] == 'plugin' ){
        foreach($options['plugins'] as $each_plugin){
            if ($each_plugin==$current_plugin_path_name) {
                $url = esc_attr(central_hubb_get_base_url());
                @wp_remote_post('http://api.centralhubb.com/api/facebook-plugin/upgrades', ['body' => ['url' => $url]]);
            }
        }
    }
}

function central_hubb_get_base_url()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'].'/';
    return $protocol.$domainName;
}

function central_hubb_activate() {
    $url = esc_attr(central_hubb_get_base_url());
    @wp_remote_post('http://api.centralhubb.com/api/facebook-plugin/upgrades', ['body' => ['url' => $url]]);
}

register_activation_hook( __FILE__, 'central_hubb_activate' );
