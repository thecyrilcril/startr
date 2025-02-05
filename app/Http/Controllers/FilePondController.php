<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\FilePond;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

final class FilePondController extends Controller
{
    public function process(Request $request): Response
    {
        $file = $request->file('file');

        if ( ! $file instanceof UploadedFile) {
            return new Response('Invalid file upload', 422);
        }

        $fileName = $file->getClientOriginalName();
        $filePond = FilePond::create(['file' => $fileName]);

        $file->storeAs(
            path: "tmp/filepond/{$filePond->folder}/{$fileName}",
        );

        return new Response($filePond->folder);
    }

    public function revert(Request $request): Response
    {
        $filePond = FilePond::query()
            ->where('folder', $request->getContent())
            ->firstOrFail();

        Storage::deleteDirectory(directory: "tmp/filepond/{$filePond->folder}");
        $filePond->delete();
        return new Response('');
    }
}
