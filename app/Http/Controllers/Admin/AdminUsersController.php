<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserForm;
use App\Http\Requests\UpdateUserForm;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{

    private function store_file($file)
    {

        $name = time() . $file->getClientOriginalName();
        $file->move('uploads', $name);
        $photo = Photo::create(['file' => $name]);

        return $photo->id;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserForm|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserForm $request)
    {
        $inputData = $request->all();

        if ($request->file('photo_id')) {
            $inputData['photo_id'] = $this->store_file($request->file('photo_id'));
        }

        $inputData['password'] = bcrypt($request->password);

        User::create($inputData);

        Session::flash('notify', 'User has been successfully created');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');

        return view('admin.users.edit', ['roles' => $roles, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserForm|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserForm $request, $id)
    {

        $user = User::findOrFail($id);

        if (!empty($request->password)) {
            $inputData['password'] = bcrypt($request->password);
        } else {
            $inputData = Input::except('password');
        }


        if ($request->file('photo_id')) {
            $inputData['photo_id'] = $this->store_file($request->file('photo_id'));
        }

        $user->update($inputData);

        Session::flash('notify', 'User has been successfully updated');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);

        $userPhoto = public_path() . $user->photo->file;

        if(file_exists($userPhoto)){
            @unlink($userPhoto);
        }

        $user->delete();

        Session::flash('notify', 'User has been successfully deleted');

        return redirect()->route('users.index');

    }
}
