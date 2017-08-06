<?php

if (!function_exists('channels')) {
    function channels() {
        return app('channels')->show();
    }
}
