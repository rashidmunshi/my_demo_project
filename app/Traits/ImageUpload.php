<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait ImageUpload
{
    public function uploadImage($file_path, $request, $field_name)
    {
        if ($request->hasFile($field_name)) {
            $destination = $file_path;

            $file = $request->file($field_name);
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $file_name);
            return [
                'status' => true,
                'message' => 'file upload success',
                'data' => $file_name
            ];
        }
        return [
            'status' => false,
            'message' => 'file not found'
        ];
    }
}
