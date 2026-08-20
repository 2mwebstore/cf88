<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Newsfeed;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class UpdateController extends Controller
{
    public function store(Request $request)
{
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $folder = uniqid();
        Newsfeed::create([
            'title' => $request->title,
        ]);
        // Store the file
        $path = $file->move('public/client-img/' . $folder, $filename);
        
        if ($path) {

            $imageUrl = '/storage/client-img/' . $folder . '/' . $filename;
            
           
            return response()->json([
                'success' => true,
                'message' => 'Image uploaded successfully',
                'path' => $path,
                'url' => $imageUrl
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload image'
            ], 500);
        }
    }
}

        public function post(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        if ($request->hasFile('photo')) {
            $photo = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('upload'), $photo);
            $image = 'https://cf88.news/public/upload/' . $photo;
        }
        $NewsfeedId = Newsfeed::create([
            'post_id'      => 0000,
            'photo'        => $image ?? '',
            'date'         => Carbon::now('Asia/Phnom_Penh')->format('Y-m-d H:i:s'),
            'title'        => $request->title,
            'create_by'    => Auth::user()->id,
        ])->id;
        $user = User::findOrFail(Auth::user()->id);
        $data['total_post'] = $user->total_post+1;
        $user->update($data);
        Alert::success('Successful', 'Newsfeed created successfully.');
        return redirect()->back();
    }

}       