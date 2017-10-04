<?php
// Add the options tab on the back office
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
    acf_add_options_sub_page('Header');
}