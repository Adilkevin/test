<?php
/**
 * User: ll
 * Date: 2018/7/3
 * Time: 12:01
 */

function pr($var) {
    $template = PHP_SAPI !== 'cli' ? '<pre>%s</pre>' : "\n%s\n";
    printf($template, print_r($var, true));
}