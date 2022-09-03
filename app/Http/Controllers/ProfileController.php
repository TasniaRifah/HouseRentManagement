<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Database\QueryException;
use App\Models\User;
use Auth;
use Image;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{


    public function profile(User $user)
    {
        // if(Auth::user()->role_id == 1 | Auth::user()->role_id == 2)
        // {
        //     return view('backend.users.user-profile', compact('user'));
        // }
        // elseif(Auth::user()->role_id == 3)
        // {
        //     return view('backend.users.customer.account', compact('user'));
        // }
        
            return view('backend.users.user-profile', compact('user'));
            
        
    }

    public function edit(User $user)
    {
        
        return view('backend.users.edit-profile', compact('user'));
    }



    public function update(ProfileRequest $request, user $user)
    {
        try {

            if ($request->file('image') && $user->image) {
                unlink(storage_path('app/public/users/') . $user->image);
            }

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'image' => $this->uploadImage($request->file('image')) ?? $user->image
            ]);

            return redirect()->route('user.profile', auth()->user()->id)->withMessage('Successfully Updated');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }





    public function store(ProfileRequest $request)
    {
        if ($file = $request->file('image')){
            $fileName = date('dmY') . time() . '.' .
            $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/users'), $fileName);
        }

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'address' => $request->address,
                // 'image' => $this->uploadImage($request->file('image'))
                'image' => $fileName ?? null
            ]);
            return redirect()->route('users.index')->withMessage('Successfully Created');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }



    public function uploadImage($file = null)
    {
        if (is_null($file)) return $file;

        $fileName = date('dmY') . time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)
            ->resize(250, 250)
            ->save(storage_path('app/public/users/' . $fileName));
        return $fileName;
    }

}

