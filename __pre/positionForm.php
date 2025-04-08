<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>

<form action="positionSend.php" method="post">
    <label for="name">Jméno:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="message">Zpráva:</label>
    <textarea id="message" name="message" required></textarea>
    
    <input type="submit" value="Odeslat">
</form>
