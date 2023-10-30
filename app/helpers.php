<?php

if (!function_exists('isAdmin')) {
    function isAdmin($access)
    {
        return in_array(auth()->user()->role_id, $access);
    }
}
