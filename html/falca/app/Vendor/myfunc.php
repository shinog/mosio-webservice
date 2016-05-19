<?php

function searchItem($needle, array $array)
{
    foreach ($array['Favorite'] as $favorite) {
        if ($favorite['user_id'] == $needle) {
            return $favorite;
        }
    }
}

function sumItem(array $array)
{
    $datesum = 0;
    foreach ($array['Purchase'] as $purchase) {
        $datesum += $purchase['quantity'];
    }
	return $datesum;
}


?>