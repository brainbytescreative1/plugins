<?php

function display_year() {
    $year = date('Y');
    return $year;
}
add_shortcode('year', 'display_year');