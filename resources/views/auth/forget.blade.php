@extends('dashboard')
@section('content')
		  
		
    <div class="container" >
    
   @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- Content here -->
            <form role="form" method="POST" action="{{ route ('password.request')}}" class="text-start">
            @csrf
            @if (Session::has('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <span class="text-sm">{{ Session::get('status') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                <div style="text-align: center;">
                    <p><h3>Forget Password</h3></p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control">
                    @error('email')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
                
      			<!-- submit button -->
    			<div class="d-grid">
        			<input class="btn btn-dark btn-lg enabled" id="submitButton" name="submit" type="submit" value="Submit"/>
      			</div>  
                  <div class="mb-3 form-check">
                    
                    <label class="form-check-label" for="exampleCheck1">
                        <a href="forget" style="color:black">Forgot Password</a>&nbsp;               
                        <a href="{{ route('login') }}" style="color:black">Login as User</a>&nbsp;
                        <a href="{{ route('register-user') }}" style="color:black">New Here? SIGN UP!</a>
                    </label>
                </div>
            </form>
        </div>
        <br><br>
        
        @endsection

		
  		