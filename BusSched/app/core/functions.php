<?php

// function to print URL
function show($stuff) {
    echo '<pre>';
    print_r($stuff);
    echo '</pre>';
}

// muting js
function esc($str) {
    return htmlspecialchars($str);
}

function redirect($path) {
    header("Location: " . ROOT . "/" . $path);
    die;
}

function adminredirect($path) {
    header("Location: " . ROOT . "/admins/" . $path);
    die;
}