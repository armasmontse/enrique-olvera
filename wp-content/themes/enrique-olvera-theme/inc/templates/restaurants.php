<section style="padding: 5% 0%; " id="<?= __('restaurantes',TRANSDOMAIN) ?>">
    <div class="grid__restaurants" >
        <?php foreach ($home_page->restaurants as $key => $restaurant): ?>
            <div class="">
                <a href="#restaurant-<?= $restaurant->slug  ?>" rel="<?php echo $restaurant->has_popup ? 'modal:open': '';?>" class="<?php echo $restaurant->has_popup ? '': 'restaurants--no-active-modal';?>">
                    <?php if ($restaurant->thumbail_img): ?>
                        <img class="restaurants__img"
                            src="<?= $restaurant->thumbail_img->src ?>"
                            alt="<?= $restaurant->thumbail_img->alt ?>"
                        >
                    <?php endif; ?>

                    <p class="restaurants__label"><?= $restaurant->title  ?>
                        <?php if (!empty($restaurant->location->label) ): ?>
                            <span class="label-country">(  <?= $restaurant->location->label  ?> )</span>
                        <?php endif; ?>
                    </p>
                </a>
            </div>
            <!-- seccion 'modal de restaurantes' -->
            <?php  include get_stylesheet_directory() . '/inc/templates/modal.php'  ?>
        <?php endforeach; ?>
    </div>
</section>
