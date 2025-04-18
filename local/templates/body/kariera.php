<div>
    <?php include "menu/menu.php"; ?>
    <div class="ui fluid container">
        <header>
            <picture>
                      <source media="(max-width: 530px)" srcset="<?= $layoutImages.'kariera_mobil.webp'?>">
                      <img 
                            class="ui fluid image" 
                            src="<?= $layoutImages.'kariera-hlavicka.webp'?>" 
                            alt="kariéra">
            </picture>
        </header>
    </div>
    <div class="ui container">
        <main class="kariera">
            <div class="ui grid stackable">
                <div class="sixteen wide column">
                    <h1 class="ui primary header">Kariéra</h1>
                    <p>Hledáme nadšené kolegy, kteří mají rádi svou práci a chtějí se podílet na výrobě produktů, za které se můžeme s hrdostí postavit.</p>
                </div>
                <div class="sixteen wide column">
                    <div class="gray-box image">
                        <div class="ui grid stackable">
                            <div class="ten wide column">
                                <img class="ui fluid image" src="<?= $layoutImages.'kariera.webp' ?>" alt="kariera" />
                            </div>
                            <div class="six wide column middle aligned">
                                <h2 class="ui primary header">chcete být součástí týmu?</h2>
                                <p>Pojďte pracovat v prostředí, kde se řemeslo snoubí s moderní výrobou!</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="sixteen wide column">
                    <h2 class="ui primary header">výhody práce u nás</h2>
                    <div class="gray-box">
                        <div class="ui two column grid stackable">
                            <div class="column">
                                <ul>
                                    <li>dovolená nad rámec zákona (22 dní/rok)</li>
                                    <li>příspěvek na dovolenou</li>
                                    <li>příspěvek na životní a penzijní připojištění</li>
                                </ul>
                            </div>
                            <div class="column">
                                <ul>
                                    <li>podnikové stravování</li>
                                    <li>příspěvek na pohybové aktivity</li>
                                    <li>sleva na výrobky</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sixteen wide column">
                    <h2 class="ui primary header">volné pracovní pozice</h2>
                    <div class="gray-box">
                        <div class="ui two column grid stackable">
                            <div class="column">
                                <p><strong>Řídící pracovníci na oddělení narážek</strong></p>
                                <ul>
                                    <li>3 nabízená místa</li>
                                    <li>Minimální stupeň vzdělání: střední odborné (vyučen)</li>
                                </ul>
                                <p><strong>Asistent/ka marketingu</strong></p>
                                <ul>
                                    <li>1 nabízené místo</li>
                                </ul>
                            </div>
                            <div class="column">
                                <p><strong>Výrobní pracovníci – narážka, udírny, balení</strong></p>
                                <ul>
                                    <li>10 nabízených míst</li>
                                    <li>Minimální stupeň vzdělání: základní + praktická škola</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sixteen wide column">
                    <h2 class="ui primary header">KONTAKTNÍ FORMULÁŘ</h2>
                    <p>Vyplňte náš kontaktní formulář a my se vám ozveme.</p>
                    <div class="gray-box">
                        <div class="ui grid">
                            <div class="sixteen wide column">
                                
                                <form class="ui form" action="form/kariera" method="POST">
                                    <div class="two fields">
                                        <div class="required field">
                                            <label>Jméno a příjmení</label>
                                            <input type="text" name="name" placeholder="Jan Novák" maxlength="90" required>
                                        </div>
                                        <div class="required field">
                                            <label>E-mail</label>
                                            <input type="email" name="email" placeholder="mail@example.cz" maxlength="90" required>
                                        </div>
                                    </div>
                                    <div class="two fields">
                                        <div class="required field">
                                            <label>Telefonní číslo</label>
                                            <input type="tel" name="phone" placeholder="777888555" pattern="^[0-9]{9,18}$" required>
                                        </div>
                                        <div class="required field">
                                            <label>Bydliště</label>
                                            <input type="text" name="address" placeholder="Ulice 123, Město 100 00" required>
                                        </div>
                                    </div>
                                    <div class="required field">
                                        <label>Název pozice, o kterou máte zájem</label>
                                        <select name="job" id="job" required>
                                            <option value="" selected disabled>Klikněte a vyberte pozici</option>
                                            <option value="Řídící pracovníci na oddělení narážek">Řídící pracovníci na oddělení narážek</option>
                                            <option value="Asistent/ka marketingu">Asistent/ka marketingu</option>
                                            <option value="Výrobní pracovníci – narážka, udírny, balení">Výrobní pracovníci – narážka, udírny, balení</option>
                                        </select>
                                    </div>
                                    <div class="field">
                                        <label>Vaše zpráva (volitelně)</label>
                                        <textarea name="message" placeholder="Zde můžete napsat zprávu..." maxlength="250"></textarea>
                                    </div>
                                    <div class="field">
                                        <button type="submit" class="ui primary button">Odeslat</button>
                                    </div>
                                </form>
                                <?php
                                    if(DEVELOPMENT) {
                                        include 'kariera/test.php';  // přidá formulář s daty pro odeslání testovacích dat
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
