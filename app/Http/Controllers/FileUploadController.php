<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\FilePond;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

final class FileUploadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $filePondRecord = FilePond::query()
            ->whereFolder($request->file)
            ->firstOrFail();

        $user = User::query()
            ->firstOrCreate([
                'last_name' => 'fehintoluwa',
                'first_name' => 'oluwafemi',
                'email' => 'cyrilcril@gmail.com',
                'password' => '$2y$12$q54A5k1tiTzk4lNRmhUsU.6RX8yOwljQD.Vb0lNBtS7g0Uf8OlOpe',
            ]);

        $filePath = \App\Enums\FilePondSettings::filePath($filePondRecord);
        $fileDirectory = \App\Enums\FilePondSettings::fileDirectory($filePondRecord);

        $user
            ->addMedia(file: $filePath)
            ->toMediaCollection('uploads');

        Storage::deleteDirectory(directory: $fileDirectory);
        $filePondRecord->delete();

        return new JsonResponse(
            data: [],
            status: Response::HTTP_OK,
        );

    }
}
