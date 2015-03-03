<?php

function templatesList(){

    $themes = \File::directories(app_path().'/themes');
    $themes = array_map('basename', $themes);
    foreach($themes as $theme){
        $files = \File::files(app_path().'/themes/'.$theme.'/templates');
        $files = array_map('basename', $files);
        foreach($files as $file){
            $file =  preg_replace("/\\.blade.php/", "", $file);
            $filesSelect[$file] = $theme.' &raquo; ';
            $filesSelect[$file] .= preg_replace("/\\.blade.php/", "", $file);
        }
    }
    return $filesSelect;

}