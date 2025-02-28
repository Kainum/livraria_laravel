<?php

namespace App\Services;

use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\UploadedFile;
use Storage;

class Operations {

    public static function money($value) {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

    public static function decryptId($value) {
        try {
            $value = Crypt::decrypt($value);
        } catch (DecryptException $e) {
            abort(403, 'Id inválido');
        }
        return $value;
    }

    public static function getFile($file) {
        return Storage::url($file);
    }

    public static function storeFile(UploadedFile $file, string $directory) {
        $path = $directory . '/' . $file->hashName();
        Storage::disk('public')->put($path, $file->get());
        return $path;
    }

    public static function updateFile(UploadedFile $file, string $directory, string $current_file) {
        if (Storage::disk('public')->exists($current_file)) {
            Storage::disk('public')->delete($current_file);
        }
        return self::storeFile($file, $directory);
    }

}