<?php

if (!function_exists('formatDate')) {
    function formatDate($timestamp = null)
    {
        return date('d.m.Y H:i:s', $timestamp ?? time());
    }
}