<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


$dir = 'pages/';
$files = scandir($dir);
$menu = [];

foreach ($files as $file) {
  if (pathinfo($file, PATHINFO_EXTENSION) === 'html') {
    $filename = pathinfo($file, PATHINFO_FILENAME);
    $menu[] = ['name' => ucfirst($filename), 'url' => $dir . $file];
  }
}

?>

<nav>
  <ul>
    <?php foreach ($menu as $item): ?>
      <li><a href="<?php echo $item['url']; ?>"><?php echo $item['name']; ?></a></li>
    <?php endforeach; ?>
  </ul>
</nav>
