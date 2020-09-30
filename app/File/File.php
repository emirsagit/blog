<?php

namespace App\File;

use Illuminate\Support\Facades\Storage;

class File
{
    protected $modelColumn;
    protected $requestFile;
    protected $destination;

    public function __construct($requestFile, $modelColumn, $destination = "img/")
    {
        $this->requestFile = $requestFile;
        $this->modelColumn = $modelColumn;
        $this->destination = $destination;
    }

    public function uploadFile()
    {
        $name = $this->requestFile->getClientOriginalName();
        $filename = pathinfo($name, PATHINFO_FILENAME);
        $extension = $this->requestFile->extension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $this->requestFile->storeAs($this->destination, $fileNameToStore);
        return "/storage/" . $this->destination . $fileNameToStore;
    }

    //defaultfile olarak silinmesini istemediğiniz default fotoyu gönderin.
    public function deleteFile($defaultNotDeleteFile = null)
    {
        if ($this->modelColumn != $defaultNotDeleteFile) {
            $oldThumbnail = explode('/', $this->modelColumn, 3);
            Storage::delete($oldThumbnail[2]);
        }
    }
}
