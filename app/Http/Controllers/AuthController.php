<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\DB;
use App\Mail\UserMail;
use App\Models\User;
use App\Mail\ForgetPassword;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    $user=User::firstwhere('email',$request->email);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            session(['id' => $user->id]);
            // echo "<script>alert($a);</script>";
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }
//    print_r($credentials);
Log::channel('authentication')->info('User failed to login.', ['email' => $credentials['email']]);
           
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function registration()
    {
        return view('auth.sign-up');
    }
      
    public function customRegistration(Request $request)
    {  
        $attributes = request()->validate([
            'name' => 'required|max:100',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'type' => 'required',
            'photo' => 'required'
        ]);
           
        // $data = $request->all();
        $user = User::create($attributes);
       
        
        if($request->hasFile('photo')){
            $filename = $request->file('photo')->getClientOriginalName();
            // $filepath = $request->file('photo')->storeAs('file',$filename,'public');
            $request->photo->move(public_path('file'), $filename);
            $user->photo = $filename;
            $user->save();
        }
        auth()->login($user);     
        return redirect("dashboard")->withSuccess('You have signed-in');
    
    }
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('auth.home');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }

    public function checkemail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
 
            return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }
 
    public function resetFun(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {

                $user->forceFill([
                    'password' => ($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}