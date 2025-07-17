<?php

namespace App\Helpers;

class General {
    public static function formatDate($date) {
        return date('d-m-Y', strtotime($date));
    }

    public static function generateSlug($string) {
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($string));
        return trim($slug, '-');
    }
}