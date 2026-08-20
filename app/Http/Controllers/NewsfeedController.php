<?php

namespace App\Http\Controllers;
use App\Models\Newsfeed;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
class NewsfeedController extends Controller
{
    public function index(Request $request)
    {
        $query = Newsfeed::query();
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $query->orderBy('id', 'desc');
        $perPage = $request->input('length', 10);
        $Newsfeed = $query->paginate($perPage)->appends([
            'search' => $request->search,
            'length' => $perPage
        ]);

        return view('admin/newsfeed/index', compact('Newsfeed'));
    }
        public function create()
    {
        return view('admin/newsfeed/create');
    }
       public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'photo'       => 'required',
        ]);
        $NewsfeedId = Newsfeed::create([
            'post_id'      => 0000,
            'photo'        => $request->photo ?? '',
            'photo1'       => $request->photo1 ?? '',
            'photo2'       => $request->photo2 ?? '',
            'photo3'       => $request->photo3 ?? '',
            'photo4'       => $request->photo4 ?? '',
            'photo5'       => $request->photo5 ?? '',
            'photo6'       => $request->photo6 ?? '',
            'photo7'       => $request->photo7 ?? '',
            'photo8'       => $request->photo8 ?? '',
            'photo9'       => $request->photo9 ?? '',
            'photo10'      => $request->photo10 ?? '',
            'photo11'      => $request->photo11 ?? '',
            'photo12'      => $request->photo12 ?? '',
            'photo13'      => $request->photo13 ?? '',
            'date'         =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'title'        => $request->title,
            'detail'       => $request->detail,
            'detail1'      => $request->detail1,
            'detail2'      => $request->detail2,
            'detail3'      => $request->detail3,
            'detail4'      => $request->detail4,
            'detail5'      => $request->detail5,
            'detail6'      => $request->detail6,
            'detail7'      => $request->detail7,
            'detail8'      => $request->detail8,
            'detail9'      => $request->detail9,
            'detail10'     => $request->detail10,
            'detail11'     => $request->detail11,
            'detail12'     => $request->detail12,
            'detail13'     => $request->detail13,
            'create_by'    => Auth::user()->id,


        ])->id;
        return redirect()->route('newsfeed')->with('success', 'Newsfeed created successfully.');
    }
        public function edit(Newsfeed $newsfeed,$id)
    {
        $Newsfeed = Newsfeed::whereId($id)->firstOrFail();
        return view('admin/newsfeed/edit', compact('Newsfeed'));
    }
        public function update(Request $request, Newsfeed $newsfeed,$id)
    {
        $newsfeed = Newsfeed::whereId($id)->first();

        $date = date('Y-m-d H:i:s' , strtotime($request->date));
        $title = $request->title;
        $data = [
            'date'  =>date('Y-m-d H:i:s' , strtotime($request->date)),
            'photo'    => $request->photo,
            'photo1'    => $request->photo1,
            'photo2'    => $request->photo2,
            'photo3'    => $request->photo3,
            'photo4'    => $request->photo4,
            'photo5'    => $request->photo5,
            'photo6'    => $request->photo6,
            'photo7'    => $request->photo7,
            'photo8'    => $request->photo8,
            'photo9'    => $request->photo9,
            'photo10'    => $request->photo10,
            'photo11'    => $request->photo11,
            'photo12'    => $request->photo12,
            'photo13'    => $request->photo13,

            'title'     => $request->title,
            'detail'   => $request->detail,

            'detail1'      => $request->detail1,
            'detail2'      => $request->detail2,
            'detail3'      => $request->detail3,
            'detail4'      => $request->detail4,
            'detail5'      => $request->detail5,
            'detail6'      => $request->detail6,
            'detail7'      => $request->detail7,
            'detail8'      => $request->detail8,
            'detail9'      => $request->detail9,
            'detail10'      => $request->detail10,
            'detail11'      => $request->detail11,
            'detail12'      => $request->detail12,
            'detail13'      => $request->detail13,
        ];
        $newsfeed->update($data);
        
        return redirect()->route('newsfeed')->with('success', 'Newsfeed updated successfully.');
    }
     public function destroy($id)
     {
        $newsfeed = Newsfeed::findOrFail($id);
        $user = User::findOrFail($newsfeed->create_by);
        $user->decrement('total_post');
        $photoPath = str_replace('https://cf88.news/public/upload/', '', $newsfeed->photo);
        // Delete file if exists
        if (File::exists(public_path('upload/' . $photoPath))) {
            File::delete(public_path('upload/' . $photoPath));
        }

        //  File::delete('upload' . $Newsfeed->photo);
        //  File::delete('upload' . $Newsfeed->photo1);
        //  File::delete('upload' . $Newsfeed->photo2);
        //  File::delete('upload' . $Newsfeed->photo3);
        //  File::delete('upload' . $Newsfeed->photo4);
        //  File::delete('upload' . $Newsfeed->photo5);
        //  File::delete('upload' . $Newsfeed->photo6);
        //  File::delete('upload' . $Newsfeed->photo7);
        //  File::delete('upload' . $Newsfeed->photo8);
        //  File::delete('upload' . $Newsfeed->photo9);
        //  File::delete('upload' . $Newsfeed->photo10);
        //  File::delete('upload' . $Newsfeed->photo11);
        //  File::delete('upload' . $Newsfeed->photo12);
        //  File::delete('upload' . $Newsfeed->photo13);
         $newsfeed->delete();
         Alert::success('Successful', 'Newsfeed is Deleted');
         return redirect()->back();
     }

}

