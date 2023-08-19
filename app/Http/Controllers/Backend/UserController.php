<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $userName = Auth::user()->name;
        $search = $request['search'] ?? "";
        if ($search != "") {
            //where
            $users = User::where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%")
                ->orWhere('role', 'like', "%$search%")
                ->orWhere('address', 'like', "%$search%")->paginate(2);
        } else {
            $users = User::paginate(2);
        }
        $data = compact('users', 'search','userName');
        return view('backend.pages.users.index')->with($data);
    }


    public function create()
    {
        return view('backend.pages.users.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $user = new User();
        $user['name'] = $input['name'];
        $user['phone'] = $input['phone'];
        $user['address'] = $input['address'];
        $user['email'] = $input['email'];
        $user['role'] = $input['role'];
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('backend.pages.users.edit')->with(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $user = User::find($id);
        $user['name'] = $input['name'];
        $user['phone'] = $input['phone'];
        $user['address'] = $input['address'];
        $user['email'] = $input['email'];
        $user['role'] = $input['role'];
        $user->save();
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('users.index');
    }
}
