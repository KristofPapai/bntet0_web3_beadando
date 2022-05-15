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


    function checklogin(Request $request)
    {
        $this->validate($request, [
            'neptun'   => ['required'],
            'password'  => ['required','min:3']
        ]);
        $user = array(
            'neptun' => $request->get('neptun'),
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


    function checkpassword (Request $request) {
        $user = user::findorFail($request['neptun']);
        $old_password = Hash::make($request['old_password']);
        if($old_password == $user->password){
            return back()->with('error', 'Password not matching');
        }
        user::where('neptun', $user->neptun)->update([
            'password'=> Hash::make($request['new_password']),
            'name'=>$request['name'],
            'code'=>0,
            'email'=>$user->email,
            'legitimacy'=>$user->legitimacy,
            'group_id'=>$user->group_id
        ]);
        return redirect('/main');
    }


    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}