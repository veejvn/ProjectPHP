<?php

if (!function_exists("config")) {
    function config($key)
    {
        $config = $GLOBALS["config"];

        return $config->get($key);
    }
}

if (!function_exists("redirect")) {
    function redirect($location)
    {
        if (ob_get_level()) {
            ob_end_clean();
        }

        header("Location: $location");
        exit();
    }
}
