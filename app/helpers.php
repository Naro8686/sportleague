<?php

use App\Models\Texts;
use App\Models\Settings;

function _e($key) {
    $data = Texts::where('key', $key)->pluck('value');
    return $data[0];
}

function _c($key) {
    $data = Settings::where('title', $key)->pluck('content');
    return $data[0];
}