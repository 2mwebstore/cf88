<?php

namespace App\Http\Controllers;

use App\Models\VideoR2Upload;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoR2UploadController extends Controller
{
    public function index(Request $request)
    {
        $query = VideoR2Upload::query()->orderBy('id', 'desc');
        $perPage = $request->input('length', 10);

        $uploads = $query->paginate($perPage)->appends([
            'length' => $perPage,
        ]);

        return view('admin.video-r2-upload.index', compact('uploads'));
    }

    /**
     * Return a presigned PUT URL so the browser can upload any file straight to R2.
     */
    public function presignUpload(Request $request)
    {
        $request->validate([
            'filename' => 'required|string',
            'mime'     => 'required|string',
        ]);

        $extension = pathinfo($request->filename, PATHINFO_EXTENSION);
        $key = 'uploads/' . uniqid() . '_' . time() . ($extension ? '.' . $extension : '');

        $client = new S3Client([
            'version' => 'latest',
            'region' => 'auto',
            'endpoint' => env('R2_ENDPOINT'),
            'use_path_style_endpoint' => true,
            'credentials' => [
                'key'    => env('R2_ACCESS_KEY_ID'),
                'secret' => env('R2_SECRET_ACCESS_KEY'),
            ],
        ]);

        $command = $client->getCommand('PutObject', [
            'Bucket'      => env('R2_BUCKET'),
            'Key'         => $key,
            'ContentType' => $request->mime,
        ]);

        $presignedRequest = $client->createPresignedRequest($command, '+15 minutes');
        $uploadUrl = (string) $presignedRequest->getUri();

        return response()->json([
            'status'     => true,
            'upload_url' => $uploadUrl,
            'headers'    => ['Content-Type' => $request->mime],
            'key'        => $key,
            'public_url' => rtrim(env('R2_PUBLIC_URL'), '/') . '/' . $key,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|string',
        ]);

        $upload = VideoR2Upload::create(['url' => $request->url]);

        // Each file in a multi-upload batch posts here via fetch(), so respond
        // with JSON when asked for it instead of always redirecting.
        if ($request->wantsJson()) {
            return response()->json(['status' => true, 'video' => $upload]);
        }

        return redirect()->route('video-r2-upload.index')->with('success', 'File uploaded successfully.');
    }

    public function destroy($id)
    {
        $upload = VideoR2Upload::findOrFail($id);

        $key = ltrim(str_replace(rtrim(env('R2_PUBLIC_URL'), '/'), '', $upload->url), '/');
        if ($key) {
            Storage::disk('r2')->delete($key);
        }

        $upload->delete();

        return redirect()->route('video-r2-upload.index')->with('success', 'File deleted successfully.');
    }

    public function getindex()
    {
        return response()->json([
            'status' => true,
            'videos' => VideoR2Upload::orderBy('id', 'desc')->get(),
        ]);
    }
}