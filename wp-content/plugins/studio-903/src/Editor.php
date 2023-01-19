<?php

declare(strict_types=1);

namespace Studio903;

class Editor
{
    public function __construct()
    {
        $this->forcePasteAsText();
        $this->registerAcfEssentialToolbar();
        $this->removeInternalLinkSearch();
    }

    private function forcePasteAsText(): void
    {
        add_filter(
            'tiny_mce_before_init',
            function ($in) {
                $in['paste_as_text'] = true;

                return $in;
            }
        );
    }

    private function registerAcfEssentialToolbar(): void
    {
        add_filter(
            'acf/fields/wysiwyg/toolbars',
            function ($toolbars) {
                $toolbars['Essential']    = array();
                $toolbars['Essential'][1] = array(
                    'link',
                    'undo',
                    'redo',
                    'spellchecker',
                    'fullscreen',
                );

                return $toolbars;
            }
        );
    }

    private function removeInternalLinkSearch(): void
    {
        add_action(
            'after_wp_tiny_mce',
            function () {
                echo <<<'HTML'
            <style>
                #link-selector > .howto,
                #link-selector > #search-panel {
                    display: none;
                }
    
                #wp-link-wrap {
                    height: 250px !important;
                    margin-top: -125px !important;
                }
            </style>
            HTML;
            }
        );
    }
}
