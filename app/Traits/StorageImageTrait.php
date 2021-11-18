<?php

namespace App\Traits;
use Illuminate\Support\Str;
use Storage;

trait StorageImageTrait{

	public function storageTraitUpload($request, $fieldName, $folderName) {

		if ($request->hasFile($fieldName)){

			$file = $request->$fieldName;
	        $fileNameOrigin = $file->getClientOriginalName();
	        $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
	        $filePath = $request->file($fieldName)->storeAs('public/' . $folderName, $fileNameHash);
	        $dataUpload = [
	            'file_name' => $fileNameOrigin,
	            'file_path' => Storage::url($filePath) 
	        ];
	        return $dataUpload;
		}
		return null;
		
	}

	public function storageTraitUploadMultiple($file, $folderName) {

        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/' . $folderName, $fileNameHash);
        $dataUpload = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath) 
        ];
        return $dataUpload;
	}
}