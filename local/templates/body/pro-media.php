<div>
    <?php 
    $path = "menu/menu.php";
    include $path 
    ?>
    <div class="ui fluid container">
        <header>
            <picture>
                      <source media="(max-width: 530px)" srcset="<?= $layoutImages.'talir_klobasy_mobil.webp'?>">
                      <img 
                            class="ui fluid image" 
                            src="<?= $layoutImages.'talir_klobasy_2.webp'?>" 
                            alt="klobasky">
            </picture>
        </header>
    </div>
    <div class="ui container">
        <main>
            <div class="ui grid stackable centered">
                <div class="sixteen wide column">
                    <h1 class="ui primary header">Pro média</h1>
                    <video class="" controls style="max-width: 100%; height: auto;">
                        <source src="<?= $layoutVideo.'ponnath_reklama.mp4'?>" type="video/mp4">
                        Váš prohlížeč nepodporuje HTML5 video.
                    </video>
                </div>
            </div>
        </main>
    </div>
</div>