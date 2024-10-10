<?php

namespace App\Http\Controllers;

abstract class Controller {

    protected function getFolderStorange($source, $controller) {
        $src = str_replace("default/assets/img/", "", storage_path('app/public/' . $source));
        $filename = pathinfo($src, PATHINFO_FILENAME);
        $ext = pathinfo($src, PATHINFO_EXTENSION);
        $replace = rtrim(str_replace("{$filename}.{$ext}", "", $source), "/");
        $array = explode("/", $replace);
        return str_replace("default/assets/img/", "", storage_path("app/public/{$controller}/" . $array[sizeof($array) - 1]));
    }

    protected function getFileStorange($file) {
        return str_replace("default/assets/img/", "", storage_path('app/public/' . $file));
    }

    protected function rrmdir($src) {
        $dir = opendir($src);
        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                $full = $src . '/' . $file;
                if (is_dir($full)) {
                    rrmdir($full);
                } else {
                    unlink($full);
                }
            }
        }
        closedir($dir);
        rmdir($src);
    }
}
