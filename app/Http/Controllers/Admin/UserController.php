<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\newUser;
use App\Http\Requests\Admin\updateUser;

use App\Models\Admin\User;
use App\Models\Admin\Group;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list()
    {
        $users = User::all();

        return view('Admin.users.list', compact('users'));
    }

    public function new()
    {
        $groups = Group::orderBy('created_at', 'desc')->get();

        return view('Admin.users.new', compact('groups'));
    }
    public function save(newUser $req)
    {
        $data = $req->all();
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.users.new');
        } else
        {
            return redirect()->route('adm.users.list');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        $groups = Group::orderBy('created_at', 'desc')->get();

        return view('Admin.users.edit', compact('user', 'groups'));
    }
    public function update(updateUser $req)
    {
        $data = $req->all();
        $user = User::find($data['id']);
        if ($data['password'] != null)
        {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.users.edit', $user->id);
        } else
        {
            return redirect()->route('adm.users.list');
        }
    }

    public function alert($id)
    {
        $user = User::find($id);

        return view('admin.users.alert', compact('user'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        User::find($data['id'])->delete();

        return redirect()->route('adm.users.list');
    }
}
