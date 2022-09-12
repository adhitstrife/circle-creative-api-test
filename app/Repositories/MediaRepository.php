<?php

namespace App\Repositories;

use App\Models\Media;

class MediaRepository 
{
    public function saveFile($parent, $request)
    {
        $filename = $this->getFileName($request->file);
        $fileType = $request->type;

        $this->uploadFile($filename, $request->file);
        
        $media = new Media;
        $media->file = $filename;
        $media->type = $fileType;
        $media->save();

        $media = $parent->media()->save($media);

        return $media;
    }

    private function getFileName($file)
    {
        return time().'.'.$file->getClientOriginalExtension();
    }

    private function uploadFile($filename, $file)
    {
        return $file->move(public_path('upload'), $filename);
    }
}