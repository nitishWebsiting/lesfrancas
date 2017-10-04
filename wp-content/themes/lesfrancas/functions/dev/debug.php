<?php
/*
 * Debug functions
 *
 */

show_admin_bar(false);

/**
 * @param $var
 * Debug with var_dump
 * surrounded by <pre>
 */
function vd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

/**
 * @param $var
 * Debug with var_dump
 * surrounded by <pre>
 * and die at the end
 */
function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    die();
}
