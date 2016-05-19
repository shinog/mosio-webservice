<?php 

foreach ($items as $item) {
    $sum = 0;
    foreach ($item['Purchase'] as $p) {
        $sum += $p['quantity'];
    }
    echo h($item['Item']['title']), "<br>", h($item['Item']['price']), "<br>", $sum;
}

?>