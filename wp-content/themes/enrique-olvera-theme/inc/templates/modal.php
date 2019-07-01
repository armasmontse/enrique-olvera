
<!-- <div class="jquery-modal blocker current"> -->
<div id="restaurant-<?= $restaurant->slug  ?>" class="modal restaurants-modal">
    <div class="grid__container grid__container--padding-right restaurants-modal__container">
        <div class="restaurants-modal__col--big grid__col-1-2-modal--big">
            <?php if ($restaurant->photos->left): ?>
                <img class="restaurants-modal__img"
                    src="<?= $restaurant->photos->left->src ?>"
                    alt="<?= $restaurant->photos->left->alt ?>"
                >
            <?php endif; ?>


            <div class="restaurants-modal__text">
              <div class="restaurants-modal__text-content">

                <?php if (!empty($restaurant->location->site->label) || !empty($restaurant->location->site->url)): ?>
                    <div class="restaurants-modal__link-website-wrp">
                        <a class="link-website" <?php if (!empty($restaurant->location->site->url)): ?> href="<?= $restaurant->location->site->url ?>" <?php endif; ?>  target="_blank">
                            <?=  empty($restaurant->location->site->label) ? __("Official site",TRANSDOMAIN) : $restaurant->location->site->label ?>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="restaurants-modal__paragraph">
                    <?=  $restaurant->content ?>
                </div>

                <div class="restaurants-modal__paragraph restaurants-modal__direction">
                    <?php echo wpautop(get_field('direccion_completa', $restaurant->id)); ?>
                </div>
              </div>

            </div>


        </div>

        <?php if(get_field('distribucion', $restaurant->id) == 'Horizontal'): ?>

            <!-- Sí es horizontal -->
            <div class="grid__col-1-2-modal--horizontal restaurants-modal__column-container">
                <div class="restaurants-modal__column-horizontal-container restaurants-modal__column-container--responsive">
                    <div>
                        <!-- Título -->
                        <a <?php if (!empty($restaurant->location->site->url)): ?> href="<?= $restaurant->location->site->url ?>" <?php endif; ?>  target="_blank">

                            <p class="restaurants-modal__name-center"><?=  $restaurant->title ?>
                                <?php if (!empty($restaurant->location->label) ): ?>
                                    <span class="label-country">(  <?= $restaurant->location->label  ?> )</span>
                                <?php endif; ?>
                            </p>
                            
                        </a>

                        <?php if ($restaurant->photos->down): ?>
                            <img class="restaurants-modal__images restaurants-modal__images-horizontal-1"
                                src="<?= $restaurant->photos->down->src ?>"
                                alt="<?= $restaurant->photos->down->alt ?>"
                            >
                        <?php endif; ?>
                    </div>

                    <?php if ($restaurant->photos->right): ?>
                        <img class="restaurants-modal__images restaurants-modal__images-horizontal-2"
                            src="<?= $restaurant->photos->right->src ?>"
                            alt="<?= $restaurant->photos->right->alt ?>"
                        >
                    <?php endif; ?>
                </div>

            </div>

        <?php else: ?>

            <!-- Sí es vertical -->
            <div class="grid__col-1-2-modal--small restaurants-modal__column-container">
                <!-- Título -->
                
                <a <?php if (!empty($restaurant->location->site->url)): ?> href="<?= $restaurant->location->site->url ?>" <?php endif; ?>  target="_blank">

                    <p class="restaurants-modal__name"><?=  $restaurant->title ?>
                        <?php if (!empty($restaurant->location->label) ): ?>
                            <span class="label-country">(  <?= $restaurant->location->label  ?> )</span>
                        <?php endif; ?>
                    </p>
                    
                </a>

                <div class="restaurants-modal__column-container restaurants-modal__column-container--responsive">
                    <?php if ($restaurant->photos->right): ?>
                        <img class="restaurants-modal__images restaurants-modal__images-1"
                            src="<?= $restaurant->photos->right->src ?>"
                            alt="<?= $restaurant->photos->right->alt ?>"
                        >
                    <?php endif; ?>
                    <?php if ($restaurant->photos->down): ?>
                        <img class="restaurants-modal__images restaurants-modal__images-2"
                            src="<?= $restaurant->photos->down->src ?>"
                            alt="<?= $restaurant->photos->down->alt ?>"
                        >
                    <?php endif; ?>
                </div>
            </div>

        <?php endif; ?>

    </div>

</div>
<!-- </div> -->
