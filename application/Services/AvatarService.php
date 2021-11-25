<?php

namespace Auth7\Services;

use Imagine\Image\Box;
use Imagine\Gd\Imagine;
use Auth7\Model\HumanModel;
use Imagine\Image\ImageInterface;
use Delight\FileUpload\FileUpload;
use Delight\FileUpload\Throwable\UploadCancelledException;

class AvatarService
{
    private $model;

    public function __construct()
    {
        $this->model = new HumanModel();
    }

    public function upload($userId)
    {
        try {

            $uploadedFile = (new FileUpload())
                ->withTargetDirectory(PUBLIC_PATH . 'img/avatars/' . $userId)
                ->from('avatar')
                ->save();

            return [
                'userId' => $userId,
                'filenameWithExtension' => $uploadedFile->getFilenameWithExtension(),
            ];
        } catch (UploadCancelledException $e) {
            var_dump('Error uploading file');
            exit; //TODO: define uploed failed error page
        }
    }

    public function resize($array)
    {
        try {

            $imagine = new Imagine();
            $size    = new Box(128, 128);

            $mode    = ImageInterface::THUMBNAIL_OUTBOUND;

            $imagePath = PUBLIC_PATH . 'img/avatars/' . $array['userId'] . '/' . $array['filenameWithExtension'];
            $imagine->open($imagePath)
                ->thumbnail($size, $mode)
                ->save($imagePath);

            return $array;
        } catch (\Throwable $th) {
            var_dump('Error resizing');
            exit; ///TODO: define resizing eror message
        }
    }

    public function update($array)
    {
        return $this->model->updateAvatar($array);
    }
}
