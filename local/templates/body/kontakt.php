<div>
    <?php 
    $path = "menu/menu.php";
    include $path 
    ?>
    <div class="ui fluid container">
        <header>
            <picture>
                      <source media="(max-width: 530px)" srcset="<?= $layoutImages.'budovas_mobil.webp'?>">
                      <img 
                            class="ui fluid image" 
                            src="<?= $layoutImages.'budovas.webp'?>" 
                            alt="budova">
            </picture>
        </header>
    </div>
    <div class="ui container">
        <main>
            <div class="ui grid stackable">
                <div class="sixteen wide column">
                    <h1 class="ui primary header">Kontakt</h1>
                    <p>Ponnath ŘEZNIČTÍ MISTŘI, s.r.o.
                        <br/>Pražská 117
                        <br/>342 01 Sušice, Česká republika
                        <br/>Telefon: +420 376 524 521 
                        <br/>Telefax: +420 376 524 516 
                        <br/>E- Mail: <a href="mailto:info@ponnath.cz">info@ponnath.cz </a>
                    </p>
                </div>
            </div>
        </main>
    </div>
</div>
