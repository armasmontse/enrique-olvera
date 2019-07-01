<footer class="grid__container footer--fixed" id="footer-fixed_JS">
    <div class="footer__container">
        <?php if (!empty($home_page->social_nets->nets)): ?>

            <div class="footer__container-links">

                <?php if (!empty($home_page->social_nets->instagram)): ?>
                    <a class="inline-link" href="<?php echo $home_page->social_nets->instagram['url'] ?>" target="_blank">
                        IG
                    </a>
                <?php endif; ?>

                <?php if (!empty($home_page->social_nets->facebook)): ?>
                    <a class="inline-link" href="<?php echo $home_page->social_nets->facebook['url'] ?>" target="_blank">
                        - FB: 
                    </a>

                    <a class="inline-link" href="<?php echo $home_page->social_nets->instagram['url'] ?>" target="_blank">
                        ENRIQUEOLVERAF
                    </a>
                    
                <?php endif; ?>

                <?php if (!empty($home_page->social_nets->twitter)): ?>
                    <a class="link-footer" href="<?php echo $home_page->social_nets->twitter['url'] ?>" target="_blank">
                        TW: ENRIQUEOLVERA
                    </a>
                <?php endif; ?>

            </div>
        <?php endif; ?>


        <div class="footer__container-links">
            <span class="link-footer"  id="newsletter_JS"><?= __('Suscripción al diario',TRANSDOMAIN) ?></span>
            <?php if (!empty($home_page->social_nets->spotify['url'])): ?>
                <a class="link-footer" href="<?php echo $home_page->social_nets->spotify['url'] ?>" target="_blank">
                    SPOTIFY: ENRIQUE OLVERA
                </a>
            <?php endif; ?>
        </div>

        <div class="footer__newsletter" style="display: none" id="form_JS">
            <div id="mc_embed_signup">

                <!-- todo pendiente falta intergrar final  -->
                <form
                    class="footer__newsletter-form validate"
                    action="https://elcultivo.us10.list-manage.com/subscribe/post?u=ff2d1f0894a6571389e11f159&amp;id=793e56be9e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                    target="_blank"
                    novalidate
                >
                    <div id="mc_embed_signup_scroll">

                    </div>
                    <div class="mc-field-group">
                        <input
                            type="email"
                            value=""
                            placeholder="Email"
                            name="EMAIL"
                            class="required email footer--uppercase"
                            id="mce-EMAIL"
                            required
                            >
                    </div>
                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true">
                        <input type="text" name="b_ff2d1f0894a6571389e11f159_793e56be9e" tabindex="-1" value="">
                    </div>

                    <div class="clear">
                        <button
                        type="submit"
                        class="footer--uppercase footer__submit"
                        name="subscribe"
                        id="mc-embedded-subscribe"
                        > <?=__("Enviar",TRANSDOMAIN) ?> </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</footer>
