<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class PeopleController extends Controller
{
    use RegistersUsers;
    public function getUserPermission($id,$user){
        $Data = DB::table('model_has_permissions')
        ->where('permission_id','=',$id)
        ->where('model_id','=',$user)
        ->first();
        if($Data != null){
            return 1;
        }else{
            return 0;
        }
    }
    public function permission($id){
        $permission = DB::table('permissions')->get();
        foreach ($permission as $key => $row) {
            $response[]=[
                'id'   =>$row->id,
                'name' =>$row->name,
                'have'  => $this->getUserPermission($row->id,$id) == 1 ? 'checked'  : '0',
            ];
        }
        $permission_lists = $response;
        return view('admin/user/permission', compact('id','permission_lists'));
    }
    public function permissionbyid(Request $request,$id){
        DB::table('model_has_permissions')->where('model_id', $id)->delete();
        if($request->add){
            foreach($request->add as $i => $add)
            {
                $UpdateModule_permissions= [
                    'permission_id'  => $add, 
                    'model_type'     => 'App\Models\User',
                    'model_id'       => $id,
                ];
                DB::table('model_has_permissions')->insert($UpdateModule_permissions);
            }
        }
        Alert::success('success','Permission Update successfully');
        return redirect()->back();
    }
    public function user()
    {
    if(Auth::user()->id == '1'){
        $user = User::latest()->get();
    }else{
        $user = User::where('id','!=','1')->latest()->get();
    }
        return view('admin/user/index', compact('user'));
    }
    public function user_create(Request $request)
    {
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'email_verified_at'   => date('Y-m-d H:i:s'),
            'password' => Hash::make($request->password),
        ]);
        Alert::success('Create User Successful');
        return redirect('/user');
    }
    public function user_update(Request $request)
    {
       // Validate the request data
       $id =$request->id;
       $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'phone' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        // Find the user by ID
        $user = User::findOrFail($request->id);

        // Prepare the data to update
        $data = [
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email'    => $request->email,
           'password' => Hash::make($request->password),
        ];

        // Update user data
        $user->update($data);

        // Show success alert and redirect
        Alert::success('Successful', 'User is Edited');
        return redirect('/user');
    }
    // public function user_update(Request $request, User $user)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|unique:users,name',
    //         'password' => 'required|min:6',
    //         'phone' => 'required|unique:users,phone'
    //     ]);
    //     if ($validator->fails()){
    //         Alert::success('Successful', $validator->errors());
    //         return redirect('/user');
    //     }
    //     $id = $request->id;
    //     $user = User::select('id','name','email')->whereId($id)->first();
    //     $data = [
    //         'name'     => $request->name,
    //         'phone'    => $request->phone,
    //         'email'    => $request->email,
    //         'password' => Hash::make($request->password),
    //     ];
    //     $user->update($data);
    //     Alert::success('Successful', 'User is Edited');
    //     return redirect('/user');
    // }
    public function question($id)
    {
        alert()->question('Delete User !', 'Are you sure?')
        ->showConfirmButton('<a href="/user/' . $id . '/destroy" class="text-white" style="text-decoration: none">Yes I&apos;m sure</a>', '#3085d6')->toHtml()
        ->showCancelButton('Back', '#aaa')->reverseButtons();

        return redirect('/user');
    }
    public function destroy($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $user->delete();
        Alert::success('Successful', 'user is Deleted');
        return redirect('/user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(People $people)
    {
        //
    }
    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('admin/users/edit',compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Get the user
        $user = User::findOrFail($id);

        // Validate input
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Create filename using only timestamp + extension
            $photo = time() . '.' . $request->photo->getClientOriginalExtension();

            // Move file to /public/upload
            $request->photo->move(public_path('upload'), $photo);

            // Delete old photo if exists
            if ($user->photo && file_exists(public_path($user->photo))) {
                @unlink(public_path($user->photo));
            }

            // Save new photo path
            $user->photo = 'https://cf88.news/upload/' . $photo;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\People  $people
     * @return \Illuminate\Http\Response
     */
}
