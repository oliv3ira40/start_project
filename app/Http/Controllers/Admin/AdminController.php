<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\HelpAdmin;
use App\Helpers\HelpMenuAdmin;

use App\models\Admin\User;
use App\models\Admin\Group;
use App\models\Admin\CreatedPermission;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function index()
    {
        $users = User::select('email', 'cpf', 'created_at', 'group_id')
        ->orderBy('created_at', 'desc') ->get();
        $groups = Group::orderBy('created_at')->get();
        $created_permissions = CreatedPermission::all();

        return view('Admin.index', compact(
            'users',
            'groups',
            'created_permissions',
        ));
    }

    public function withoutPermission()
    {
        dd('Sem permissão');
    }
}
