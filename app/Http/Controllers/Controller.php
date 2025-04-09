<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function uploadFile($file)
    {
        $filename = hash_file('md5', $file).'.'.$file->getClientOriginalExtension();

        $file->storeAs('uploads', $filename, 'public');
        $file->move('../public_html/storage/uploads', $filename);
        $relativePath = 'uploads/'.$filename;
        return $relativePath;
    }
}
