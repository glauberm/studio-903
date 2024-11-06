<?php

$s903_langs = pll_the_languages(array('raw' => 1));
?>

<div class="language-switcher">
    <button class="language-switcher__trigger">
        <?php
        foreach ($s903_langs as $s903_lang) :
            if (true === $s903_lang['current_lang']) :
                s903()->html(mb_strtoupper($s903_lang['slug']));
                break;
            endif;
        endforeach;
        ?>
    </button>

    <ul class="language-switcher__menu sub-menu">
        <?php
        foreach ($s903_langs as $s903_lang) :
        ?>
            <li>
                <a
                    href="<?php s903()->attr($s903_lang['url']); ?>"
                    lang="<?php s903()->attr($s903_lang['locale']); ?>">
                    <?php s903()->html($s903_lang['name']); ?>
                </a>
            </li>
        <?php
        endforeach;
        ?>
    </ul>
</div>