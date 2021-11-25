<?php

namespace Auth7\Services;

use Delight\FileUpload\FileUpload;
use Delight\FileUpload\Throwable\UploadCancelledException;

class AvatarService
{
    public function upload($userId)
    {
        try {

            $uploadedFile = (new FileUpload())
                ->withTargetDirectory(PUBLIC_PATH . $userId . '/avatars')
                ->from('avatar')
                ->save();

            return [
                $uploadedFile->getFilenameWithExtension(),
                $uploadedFile->getFilename(),
                $uploadedFile->getExtension(),
                $uploadedFile->getDirectory(),
                $uploadedFile->getPath(),
                $uploadedFile->getCanonicalPath()
            ];
        } catch (UploadCancelledException $e) {
            var_dump('Error uploading file'); exit; //TODO: define uploed failed error page
        }
    }

    public function resize()
    {
        # code...
    }

    public function save()
    {
        # code...
    }
}
