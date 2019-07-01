<div class="grid__container grid__container--no-padding header__cover-container" id="height_JS">

    <img class="header__img" id="random_JS"
        src="<?= $home_page->splah_image ? $home_page->splah_image->getImgSrc("full") : "" ?>"
        alt="<?= $home_page->splah_image ? $home_page->splah_image->alt : "" ?>"
    >

    <div class="header__title-container">
        <h1 class="header__title" id="title_JS">enrique olvera</h1>
    </div>
    <div class="header__initial-position" id="languages-fixed_JS" style="">
        <?php if (function_exists("qts_language_menu")): ?>
            <?php qts_language_menu('text', ['short' => true,'class' => 'header__languages',]) ?>
        <?php endif; ?>
    </div>
</div>
<header class="grid__container grid__container--no-padding header--no-padding" id="header-fixed_JS">
    <div class="mobile_btn_JS header__mobile--btn">&#9776;</div>
    <h1 class="header__title--fix" id="title-fix_JS">enrique olvera</h1>
    <nav class="header__container">
        <ul class="header__items">
            <a class="link-menu" href="#EO">
                <li>EO</li>
            </a>
            <a class="link-menu" href="#<?= __('restaurantes',TRANSDOMAIN) ?>">
                <li> <?= __('restaurantes',TRANSDOMAIN) ?> </li>
            </a>
            <a class="link-menu" href="#<?= __('diario',TRANSDOMAIN) ?>">
                <li><?= __('diario',TRANSDOMAIN) ?></li>
            </a>
        </ul>
    </nav>
    <nav class="header__container header__container--responsive header__mobile mobile_JS">
        <ul class="header__items">
            <a class="header__item link-menu" href="#EO">
                <li>EO</li>
            </a>
            <a class="header__item link-menu" href="#<?= __('restaurantes',TRANSDOMAIN) ?>">
                <li><?= __('restaurantes',TRANSDOMAIN) ?></li>
            </a>
            <a class="header__item link-menu" href="#<?= __('diario',TRANSDOMAIN) ?>">
                 <li><?= __('diario',TRANSDOMAIN) ?></li>
             </a>
        </ul>
    </nav>
</header>
