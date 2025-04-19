<?php
// formulář s předvyplněnými daty (není třeba formulář vyplňovat) a hidden polem 'test' pro odeslání testovacích dat.
// tato data jsou rozpoznána metodou kontroleru Form->kariera() - nejsou odesíláná mailem a slouží pro ladění
?>
                                <form class="ui form" action="form/kariera" method="POST">
                                    <input type="hidden" name="test" value="testovací data">
                                    <div class="two fields">
                                        <div class="required field">
                                            <label>Jméno a příjmení</label>
                                            <input type="text" name="name" placeholder="Jan Novák" maxlength="90" required value="Jan Novák">
                                        </div>
                                        <div class="required field">
                                            <label>E-mail</label>
                                            <input type="email" name="email" placeholder="mail@example.cz" maxlength="90" required value="mail@example.cz">
                                        </div>
                                    </div>
                                    <div class="two fields">
                                        <div class="required field">
                                            <label>Telefonní číslo</label>
                                            <input type="tel" name="phone" placeholder="777888555" pattern="^[0-9]{9,18}$" required value="777888555">
                                        </div>
                                        <div class="required field">
                                            <label>Bydliště</label>
                                            <input type="text" name="address" placeholder="Ulice 123, Město 100 00" required value="Ulice 123, Město 100 00">
                                        </div>
                                    </div>
                                    <div class="required field">
                                        <label>Název pozice, o kterou máte zájem</label>
                                        <select name="job" id="job" required>
                                            <option value="" disabled>Klikněte a vyberte pozici</option>
                                            <option selected value="Řídící pracovníci na oddělení narážek">Řídící pracovníci na oddělení narážek</option>
                                            <option value="Asistent/ka marketingu">Asistent/ka marketingu</option>
                                            <option value="Výrobní pracovníci – narážka, udírny, balení">Výrobní pracovníci – narážka, udírny, balení</option>
                                        </select>
                                    </div>
                                    <div class="field">
                                        <label>Vaše zpráva (volitelně)</label>
                                        <textarea name="message" placeholder="Zde můžete napsat zprávu..." maxlength="250" value="Zde můžete napsat zprávu..."></textarea>
                                    </div>
                                    <div class="field">
                                        <button type="submit" class="ui primary button">Odeslat testovací data</button>
                                    </div>
                                </form>       