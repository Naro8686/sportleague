<?php

use App\Models\Texts;

function _e($key) {
    $data = Texts::where('key', $key)->pluck('value');
    return $data[0];
}