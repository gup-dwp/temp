<?php


$url = 'http://spreadsheets.google.com/tq?key=19Uc0FgtNDp9EfFhiHZJHG0ax8ZCtdvxSkbZryiOxSKo&gid=1690305366&range=D17:F17';

$content = file_get_contents($url);
$json = json_decode($content, true);
echo $content;
?>
