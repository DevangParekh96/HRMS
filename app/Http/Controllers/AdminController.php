<?php

namespace App\Http\Controllers;
// use App\Mail;
use App\Models\User;
use App\Models\Employee;
use App\Models\Document;
use Illuminate\Http\Request;
use DataTables;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Jobs\SendEmailJob;
class AdminController extends Controller
{/*
    *for displaying user and emplyee data in DataTable   
    */
    public function index(Request $request)
        {
            if ($request->ajax()) {
                $data = User::join('employee','users.id','=','employee.user_id')->get(['users.*','employee.*']);
                return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', 'auth.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
                }
            return view('auth.view');
           
        } /**
        * Display a listing of the resource.
        *
        * @return \Illuminate\Http\Response
        */
       public function profileview(Request $request)
       {
           $user=User::firstwhere('id',$request->session()->get('id'));
           // echo $request->session()->get('id');
           // $user->name;
           return view('auth.profile',compact('user'));
   
       }
   
       /**
        * Show the form for creating a new resource.
        *
        * @return \Illuminate\Http\Response
        */
       public function update_user(Request $request)
       {
           $attributes= $request->validate(['name' => 'required', 'email' => 'required', 'photo'=>'mimes:png,jpg,jpeg', ]); 
           
           $user=User::firstwhere('id',$request->session()->get('id'));
           $user->update($request->all());
           if($request->hasFile('photo'))
           {
               $filename = $request->file('photo')->getClientOriginalName();
               $request->photo->move(public_path('file'), $filename);
               $user->photo = $filename;
               $user->save();
           }
           return redirect()->route('profileview');
       }
   
       /**
        * Store a newly created resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
       public function store(Request $request)
       {
           $attributes= $request->validate(['name' => 'required', 'email' => 'required', 'photo'=>'required|mimes:png,jpg,jpeg', ]); 
           $attributes2=$request->validate([ 'mno'=>'required', 'dob'=>'required', 'gender'=>'required',
               'add1'=>'required', 'add2'=>'', 'dept'=>'required','designation'=>'required','doj'=>'required','type'=>'required',]);
           $attributes3=$request->validate(['id1'=>'required|mimes:png,jpg,jpeg,pdf','id2'=>'required|mimes:png,jpg,jpeg,pdf',
               'id3'=>'required|mimes:png,jpg,jpeg,pdf','id4'=>'required|mimes:png,jpg,jpeg,pdf',]);
           $email = $request->all()['email'];
           //generate temp password and insert user data
           $attributes['password']=Str::random(8);

           
           
           $user = User::create($attributes);
           if($request->hasFile('photo'))
           {
               $filename = $request->file('photo')->getClientOriginalName();
               $request->photo->move(public_path('file'), $filename);
               $user->photo = $filename;
               $user->save();
           }

           $details=$request->only('email','name');
           dispatch(new SendEmailJob($details,$attributes['password']));

        //    Mail::to($email)->send(new UserMail($user,$attributes['password']));
       
           //set forign key insert Employee data
           $attributes2['user_id']=$user->id;
           $emp = Employee::create($attributes2);
           //document upload
           $attributes3['emp_id']=$emp->id;
           $doc = Document::create($attributes3);
           if(!empty($attributes3))
           {
              foreach ($attributes3 as $a => $b)
              {
               if(is_numeric($b)){ 
                   continue;     }
               $filename = $request->file($a)->getClientOriginalName();
               $request->file($a)->move(public_path('upload'), $filename);
               $doc->$a = $filename;
               }
           }
           $doc->save();
           return view('auth.view');
       }
   
     
       /**
        * Display the specified resource.
        *
        * @param  \App\Models\Employee  $employee
        * @return \Illuminate\Http\Response
        */
       public function show(Employee $employee,$user_id)
       {
           $employee=Employee::firstwhere('user_id', $user_id);
           return view('auth.edit',compact('employee'));
       }
   
       /**
        * Show the form for editing the specified resource.
        *
        * @param  \App\Models\Employee  $employee
        * @return \Illuminate\Http\Response
        */
       public function edit(Employee $employee,$user_id)
       {
           $employee=User::join('employee','users.id','=','employee.user_id')->where('employee.user_id', $user_id)->get(['users.*','employee.*']);
           return view('auth.edit',compact('employee'));
       }
   
       /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \App\Models\Employee  $employee
        * @return \Illuminate\Http\Response
        */
       public function update(Request $request,$user_id)
       {
           $attributes= $request->validate(['name' => 'required', 'email' => 'required', 'photo'=>'mimes:png,jpg,jpeg', ]); 
           $attributes2=$request->validate(['mno'=>'required', 'dob'=>'required', 'gender'=>'required',
               'add1'=>'required', 'add2'=>'', 'dept'=>'required','designation'=>'required','doj'=>'required','type'=>'required',]);
           $attributes3=$request->validate(['id1'=>'mimes:png,jpg,jpeg,pdf','id2'=>'mimes:png,jpg,jpeg,pdf',
               'id3'=>'mimes:png,jpg,jpeg,pdf','id4'=>'mimes:png,jpg,jpeg,pdf',]);
           $user=User::find($user_id);
           $user->update($request->all());
           if($request->hasFile('photo'))
           {
               $filename = $request->file('photo')->getClientOriginalName();
               $request->photo->move(public_path('file'), $filename);
               $user->photo = $filename;
               $user->save();
           }
           $attributes2['user_id']=$user->id;
           $emp=Employee::firstwhere('user_id',$user->id);
           $emp->update($attributes2);
           // //document upload
           $attributes3['emp_id']=$emp->id;
           $doc=Document::firstwhere('emp_id',$emp->id);
           $doc->update($attributes3);
           if(!empty($attributes3))
           {
              foreach ($attributes3 as $a => $b)
              {
               if(is_numeric($b)){ 
                   continue;     }
               $filename = $request->file($a)->getClientOriginalName();
               $request->file($a)->move(public_path('upload'), $filename);
               $doc->$a = $filename;
               }
           }
           $doc->save();
           return view('auth.view');
         }
   
       /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Models\Employee  $employee
        * @return \Illuminate\Http\Response
        */
       public function destroy($user_id)
       {
           $user=User::firstwhere('id',$user_id);
           $user->delete();
           return redirect()->route('emp.index')->with('success','User deleted successfully');
       }
       //change active deactive stauts
       public function status(Employee $emp,$user_id)
       {
           $emp=Employee::firstwhere('user_id',$user_id);
           if($emp->status==0)
           {
               $emp->status=1;
               $emp->save();
           }
           
           elseif($emp->status==1)
           {
               $emp->status=0;
               $emp->save();
           }
           return view('auth.view');
       }
    public function viewadd()
    {
        return view('auth.add');
    }     
      
}

