<?php


if(!function_exists('superheros')) {
    function superheros() {
        return app(\Danstuchbury\Superheros\Superheros::class);
    }
}
