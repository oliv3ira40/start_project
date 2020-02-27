<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Helpers\HelpAdmin;
use App\Helpers\HelpMenuAdmin;

use App\Models\Admin\User;
use App\Models\Admin\Group;
use App\Models\Admin\CreatedPermission;

use App\Jobs\Admin\NotificationCalled;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Foreach_;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function index()
    {
        // dd(HelpAdmin::permissionsUser($user = null));

        $data['user'] = \Auth::user();
        $data['users'] = User::select('id', 'first_name', 'last_name', 'email', 'group_id', 'deleted_at')
            ->withTrashed()    
            ->orderBy('created_at', 'desc')
            ->paginate(10, ['*'], 'list_users_page');

        $data['groups'] = Group::orderBy('created_at')->paginate(10, ['*'], 'groups_page');
        $data['created_permissions'] = CreatedPermission::all();

        return view('Admin.index', compact('data'));
    }

    public function withoutPermission()
    {
        return view('Admin.without_permission');
    }
}