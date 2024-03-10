<?php

declare(strict_types=1);

namespace Studio903;

class TidyingRay
{
    public static function tidyUp(): void
    {
        self::adjustAttachmentFeatures();
        self::adjustProfileFeatures();
        self::adjustEditorSettings();
        self::adjustMceButtons();
        self::adjustAdminMenus();
        self::adjustPageFeatures();
        self::adjustPageLabels();
        self::removeMediaButtons();
        self::forcePasteAsText();
        self::registerCustomAdminColumnsStyles();
        self::registerAcfEssentialToolbar();
        self::removeEmojis();
    }

    private static function adjustAttachmentFeatures(): void
    {
        add_action(
            'admin_head',
            function () {
                echo <<<'HTML'
                <style>
                    .attachment-info .setting.has-description,
                    .attachment-info #alt-text-description,
                    .attachment-info .setting[data-setting='caption'],
                    .attachment-info .setting[data-setting='description'],
                    .attachment-info .actions a,
                    .attachment-info .actions .links-separator,
                    .attachment-info ~ .setting.has-description,
                    .attachment-info ~ #alt-text-description,
                    .attachment-info ~ .setting[data-setting='caption'],
                    .attachment-info ~ .setting[data-setting='description'],
                    .attachment-info ~ .actions a,
                    .attachment-info ~ .actions .links-separator {
                        display: none !important;
                    }
                </style>
                HTML;
            }
        );
    }

    private static function adjustProfileFeatures(): void
    {
        add_action(
            'admin_head',
            function () {
                echo <<<'HTML'
                <style>
                    #your-profile .user-rich-editing-wrap,
                    #your-profile .user-comment-shortcuts-wrap,
                    #your-profile .user-first-name-wrap,
                    #your-profile .user-last-name-wrap,
                    #your-profile .user-display-name-wrap,
                    #your-profile .user-url-wrap,
                    #your-profile .user-description-wrap,
                    #your-profile .pw-weak,
                    #application-passwords-section,
                    #application-passwords-section ~ h2,
                    #your-profile .user-capabilities-wrap {
                        display: none !important;
                    }
                </style>
                HTML;
            }
        );
    }

    private static function adjustEditorSettings(): void
    {
        add_filter(
            'wp_editor_settings',
            function ($settings) {
                $settings['textarea_rows'] = 4;
                $settings['editor_height'] = 113;
                $settings['quicktags'] = false;
                return $settings;
            }
        );
    }

    private static function adjustMceButtons(): void
    {
        add_filter(
            'mce_buttons',
            function ($buttons) {
                return [
                    'undo',
                    'redo',
                    'spellchecker',
                ];
            }
        );

        add_filter('mce_buttons_2', fn ($buttons) => []);
        add_filter('mce_buttons_3', fn ($buttons) => []);
        add_filter('mce_buttons_4', fn ($buttons) => []);
    }

    private static function adjustAdminMenus(): void
    {
        add_action(
            'admin_menu',
            function () {
                remove_menu_page('edit.php'); // Posts
                // remove_menu_page('upload.php'); // Media
                // remove_menu_page('edit.php?post_type=page'); // Pages
                remove_menu_page('edit-comments.php'); // Comments
                // remove_menu_page('themes.php'); // Appearance
                // remove_menu_page('plugins.php'); // Plugins
                // remove_menu_page('users.php'); // Users
                // remove_menu_page('tools.php'); // Tools
                // remove_menu_page('options-general.php'); // Settings
                // remove_menu_page('edit.php?post_type=acf-field-group'); // ACF
            }
        );
    }

    private static function adjustPageFeatures(): void
    {
        add_action(
            'init',
            function () {
                // remove_post_type_support('page', 'editor');
                remove_post_type_support('page', 'author');
                // remove_post_type_support('page', 'thumbnail');
                remove_post_type_support('page', 'excerpt');
                remove_post_type_support('page', 'trackbacks');
                remove_post_type_support('page', 'custom-fields');
                remove_post_type_support('page', 'comments');
                remove_post_type_support('page', 'page-attributes');
                remove_post_type_support('page', 'post-formats');
            }
        );
    }

    private static function adjustPageLabels(): void
    {
        add_action(
            'init',
            function () {
                $get_post_type = get_post_type_object('page');

                $labels = $get_post_type->labels;

                $labels->name = 'Sections';
                $labels->singular_name = 'Section';
                $labels->add_new = 'Add Section';
                $labels->add_new_item = 'Add Section';
                $labels->edit_item = 'Edit Section';
                $labels->new_item = 'Section';
                $labels->view_item = 'View Section';
                $labels->search_items = 'Search Sections';
                $labels->not_found = 'No Section found';
                $labels->not_found_in_trash = 'No Section found in Trash';
                $labels->all_items = 'All Sections';
                $labels->menu_name = 'Sections';
                $labels->name_admin_bar = 'Sections';
            }
        );
    }

    private static function removeMediaButtons(): void
    {
        add_action(
            'admin_head',
            function () {
                remove_action(
                    'media_buttons',
                    'media_buttons'
                );
            }
        );
    }

    private static function forcePasteAsText(): void
    {
        add_filter(
            'tiny_mce_before_init',
            function ($args) {
                $args['paste_as_text'] = true;

                return $args;
            }
        );
    }

    private static function registerCustomAdminColumnsStyles(): void
    {
        add_action(
            'admin_head',
            function () {
                echo <<<HTML
                <style>
                    .column-thumbnail {
                        width: 200px;
                    }
                </style>
                HTML;
            }
        );
    }

    private static function registerAcfEssentialToolbar(): void
    {
        add_filter(
            'acf/fields/wysiwyg/toolbars',
            function ($toolbars) {
                $toolbars['Essential']    = array();
                $toolbars['Essential'][1] = array(
                    'undo',
                    'redo',
                    'spellchecker',
                );

                return $toolbars;
            }
        );
    }

    private static function removeEmojis(): void
    {
        add_action(
            'init',
            function () {
                remove_action('wp_head', 'print_emoji_detection_script', 7);
                remove_action('admin_print_scripts', 'print_emoji_detection_script');
                remove_action('wp_print_styles', 'print_emoji_styles');
                remove_filter('the_content_feed', 'wp_staticize_emoji');
                remove_action('admin_print_styles', 'print_emoji_styles');
                remove_filter('comment_text_rss', 'wp_staticize_emoji');
                remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
                add_filter(
                    'tiny_mce_plugins',
                    function ($plugins) {
                        if (is_array($plugins)) {
                            return array_diff($plugins, array('wpemoji'));
                        } else {
                            return array();
                        }
                    }
                );
            }
        );
    }
}
