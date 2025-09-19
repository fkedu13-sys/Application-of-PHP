<?php
$input = fopen("php://stdin", "r");

echo "Enter First word: ";
$wrd = trim(fgets($input));

$freq = [];

    for($i = 0; $i < strlen($wrd); $i++) {
        $char = $wrd[$i];
        if (isset($freq[$char])) {
            $freq[$char]++;
        } else {
            $freq[$char] = 1;
        }
    }
    
    
    foreach ($freq as $char => $count) {
        echo "$char: $count\n";
    }
?>