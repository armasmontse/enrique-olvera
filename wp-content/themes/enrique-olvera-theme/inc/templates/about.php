<section style="padding: 5% 0%; " id="EO">
    <div class="grid__container about__grid page-section_JS">
        <div class="about__col about__col--sml"><!-- antes<div class="grid__col-1-2--small"> -->
            <h2 class="about__title title-about">Enrique Olvera</h2>
            <div class="about__paragraph">
                <?= apply_filters('translate_text', wpautop($home_page->post->post_content)) ?>
            </div>
        </div>
        <div class="about__col about__col--big about__images"><!-- antes<div class="grid__col-1-2--big"> -->

            <?php if ($home_page->about_images->left): ?>
                <img class="about__image about__image--left"
                    src="<?= $home_page->about_images->left->getImgSrc("full")  ?>"
                    alt="<?= $home_page->about_images->left->alt ?>"
                >
            <?php endif; ?>

            <div class="about__image--container">
                <?php if ($home_page->about_images->right): ?>
                    <img class="about__image about__image--with-text"
                    src="<?= $home_page->about_images->right->getImgSrc("full")  ?>"
                    alt="<?= $home_page->about_images->right->alt ?>"
                    >
                <?php endif; ?>
            </div>

            <div class="about__image--container-down">
                <?php if ($home_page->about_images->down): ?>
                    <img class="about__image about__image--right"
                    src="<?= $home_page->about_images->down->getImgSrc("full")  ?>"
                    alt="<?= $home_page->about_images->down->alt ?>"
                    >
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
