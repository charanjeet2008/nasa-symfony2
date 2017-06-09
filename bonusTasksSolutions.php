<?php
/**
 * Bonus Tasks #1 and #2
 * User: applect
 * Date: 28/4/17
 * Time: 5:25 PM
 */


/**
 * Solution #1:
 * strpos return's 0 when it finds needle in the beginning position.
 * and, by default (int)0 is treated as false in PHP.
 * To properly match, we need to use ===
 * It will match value along with its type.
 */
$str1 = 'foobardoo';
$str2 = 'foo';
if (strpos($str1, $str2) !== FALSE) {
    echo "\"" . $str1 . "\" contains \"" . $str2 . "\"";
} else {
    echo "\"" . $str1 . "\" does not contain \"" . $str2 . "\"";
}

/**
 * Solution #2:
 * $_POST will be empty.
 * Data will will be received in file_get_contents('php://input') as a string
 */


/**
 * Problem #3:
 * A bread with butter cost 1.10 €. The bread is 1€ more expensive then the butter. How much does the butter cost?
 * Solution #3:
 * Butter = 0.05€
 */