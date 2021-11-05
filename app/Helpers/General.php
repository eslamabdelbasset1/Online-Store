<?php

use Illuminate\Support\Facades\Config;

function get_languages(){

    return \App\Models\Language::active() -> Selection() -> get();
}
