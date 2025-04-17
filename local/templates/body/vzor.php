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
                    <h1 class="ui primary header">Nadpis</h1>
                    <h2 class="ui primary header">Nadpis druhé úrovně</h2>
                    <p>text</p>
                </div>
            </div>
        </main>
    </div>
</div>
