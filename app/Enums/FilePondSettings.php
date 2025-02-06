<?php

declare(strict_types=1);

namespace App\Enums;

use App\Models\FilePond;

enum FilePondSettings: string
{
    case directory = 'app/private/tmp/filepond/';

    public static function directory(): string
    {
        return self::directory->value;
    }

    public static function filePath(FilePond $filePond): string
    {
        return storage_path(self::directory()) . $filePond->folder . '/' . $filePond->file;
    }

    public static function fileDirectory(FilePond $filePond): string
    {
        return storage_path(self::directory()) . $filePond->folder . '/';
    }
}
