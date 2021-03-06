<?php
namespace  App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursePost;
use App\Models\Timetable;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function login(){
        return view('login');
    }
    public function main(){
        $user = user::find(Auth::id());
        return view('main', ['user' => $user]);
    }
    public function racecalendar()
    {
        $user = user::find(Auth::id());
        return view('racecalendar', ['user' => $user]);
    }
    public function fileupload()
    {
        $user = user::find(Auth::id());
        return view('fileupload', ['user' => $user]);
    }
    public function filegeneration()
    {
        $user = user::find(Auth::id());
        return view('filegeneration', ['user' => $user]);
    }


    public function checklogin(Request $request)
    {
        $this->validate($request, [
            'username'   => ['required'],
            'password'  => ['required','min:3']
        ]);
        $user = array(
            'username' => $request->get('username'),
            'password' => $request->get('password')
        );
        if(Auth::attempt($user))
        {
            return redirect('/main');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }
    }

    function successlogin()
    {
        return view('main');
    }
    
    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }

}