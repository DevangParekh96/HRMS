@extends('dashboard')
@section('content')
		  
		
   
    <div class="container" >
            <!-- Content here -->
            <form role="form" method="POST" action="{{ route('login.custom') }}" class="text-start">
            @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
            @csrf
          
                <div style="text-align: center;">
                    <p><h3>Login</h3></p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control">
                    @error('email')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
      			<!-- submit button -->
    			<div class="d-grid">
        			<button class="btn btn-dark btn-lg enabled" id="submitButton" name="submit" type="submit">Login</button>
      			</div> 
            </form>
            <div class="mb-3 form-check">
                    
                    <label >
                        <a href="/forget" style="color:black">Forget Password</a>&nbsp;&nbsp;
                        <a href="{{ route('register-user') }}" style="color:black">Sign Up</a>

                    </label>
                </div>
        </div>
        <br><br>
        
        @endsection

		
  		