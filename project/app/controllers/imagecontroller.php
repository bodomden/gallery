<?php

class ImageController extends Controller
{
    public function status($data)
    {
        unset($data['_method']);
        $this->model->status(...$data);
    }

    private function uploadImage()
    {
        $image = $_FILES['upload'];

        if (!empty($image)) {
            if ($image['error'] !== UPLOAD_ERR_OK) {
                $err = 'Error during upload, try again.';
                return compact('err');
            }

            if (!exif_imagetype($image["tmp_name"])) {
                $err = 'File is not image, try again.';
                return compact('err');
            }
            $uploadTo = "./upload/";
            $imageName = $image['name'];

            move_uploaded_file($image["tmp_name"], $uploadTo . $imageName);

            return $imageName;
        }
    }

    public function store($data)
    {

        $result = $this->uploadImage();
        if (is_array($result)) {
            echo json_encode($result);
            exit;
        }
        $data['name'] = $result;
        $this->model->create($data);

        $url = "/album/{$data['album_id']}";

        echo json_encode(compact('url'));
        exit;
    }

    public function show($id)
    {
        $comments = $this->model->hasMany('comment', $id);

        echo json_encode(compact('comments'));
        exit;
    }
}
