
<div>
    <?php include "menu/menu.php"; ?>
    <div class="ui fluid container">
        <header>
            <video class="videoPC" autoplay muted loop playsinline style="width: 100%; height: auto;">
                <source src="<?= $layoutVideo.'ponnath_video.webm'?>" type="video/mp4">
                Váš prohlížeč nepodporuje HTML5 video.
            </video>
            <video class="videoMobile" autoplay muted loop playsinline style="width: 100%; height: auto;">
                <source src="<?= $layoutVideo.'ponnath_mobilevideo.webm'?>" type="video/mp4">
                Váš prohlížeč nepodporuje HTML5 video.
            </video>
        </header>
    </div>
    <div class="ui container">
        <main class="titulni">
            <div class="ui grid stackable">
                <div class="sixteen wide column">
                    <div class="ui basic segment center aligned">
                        <p>„U nás ve firmě <b>Ponnath</b> spojujeme <b>tradici s inovacemi</b> a <b>požitek z chuti s odpovědností</b>. Na tyto rodinné hodnoty úspěšně spoléháme již <b>po 11 generací</b>.”</p>
                    </div>
                </div>
                <div class="sixteen wide column">
                    <h2 class="ui primary header center aligned">Naše zásady</h2>
                    <img class="ui fluid image" src="<?= $layoutImages.'nase_hodnoty.webp'?>" alt="naše hodnoty"/>
                </div>
                <div class="sixteen wide column">
                    <div class="ui basic segment center aligned">
                        <p>„Ať už jde o <b>uzeniny, veganské speciality nebo konvenientní potraviny</b>, ať už u pultu nebo v samoobslužném regálu - ve společnosti Ponnath nabízíme <b>široký sortiment výrobků</b> pro každou chuť a ve <b>vynikající kvalitě</b>.”</p>
                    </div>
                </div>
                <div class="sixteen wide column">
                    <div class="ui two column grid stackable centered">
                        <div class="column">
                            <div class="text-above-image">
                                <img src="<?= $layoutImages.'vyroba.webp'?>" alt="vyroba" />
                                <div class="overlay-text">
                                    <h3 class="ui primary header">O nás</h3>
                                    <p>Jsme Ponnath ŘEZNIČTÍ MISTŘI – rodinná společnost s více než 325letou tradicí řeznického řemesla.</p>
                                    <p><a href="page/o-nas">Tradice v Ponnathu</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="text-above-image">
                                <img src="<?= $layoutImages.'nase_produkty.webp'?>" alt="kariera" />
                                <div class="overlay-text">
                                    <h3 class="ui primary header">Naše produkty</h3>
                                    <p>S láskou k řemeslu, s respektem k tradicím.</p>
                                    <p><a href="page/nase-produkty">Co vyrábíme?</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="text-above-image">
                                <img src="<?= $layoutImages.'kariera.webp'?>" alt="kariera" />
                                <div class="overlay-text">
                                    <h3 class="ui primary header">Přidejte se k nám</h3>
                                    <p>Společně rosteme jako společnost: Přihlaste se do rodinné skupiny PONNATH. Těšíme se na Váš životopis.</p>
                                    <p><a href="page/kariera">Kariéra v Ponnathu</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="text-above-image">
                                <img src="<?= $layoutImages.'budova.webp'?>" alt="kontakt" />
                                <div class="overlay-text">
                                    <h3 class="ui primary header">Kontakty</h3>
                                    <p>Máte dotazy? Chcete u nás pracovat? Zavolejte nebo napište!</p>
                                    <p><a href="page/kontakty">Kontaktujte nás</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>




