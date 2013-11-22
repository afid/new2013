
<?php

// Test Source
function Test11_1() {
    global $answer;

    /* The Test */
    ob_start();
    $t = microtime(true);
    while($i < 10000) {

        echo '';

        ++$i;        
    }
    $tmp = microtime(true) - $t;
    ob_end_clean();

    return $tmp;
}

// Variable Clean-up
function Test11_End() {
    global $answer;
    unset($answer);
}

echo Test11_1();
?>
