<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Helpers\HelpAdmin;

use App\Models\Admin\User;
use App\Models\Admin\Group;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function checkEmail(Request $req)
    {
        $data = $req->all();
        $user = User::where('email', $data['email'])->first();

        if($user != null) {
            return redirect()->route('adm.welcome_back', $user->id);
        } else {
            return redirect()->route('register');
        }
    }

    public function welcomeBack($user_id)
    {
        $user = User::find($user_id);
        
        return view('auth.welcome_back', compact('user'));
    }
}
