@extends('dashboard')
@section('content')
		  
		
  

    <div class="container" >
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
            <!-- Content here -->
            <form role="form" method="POST" action="{{ route ('pass.reset',['token' => $token])}}" class="text-start">
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
                    <p><h3>Forgot Password</h3></p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email ID</label>
                    <input type="email" name="email" class="form-control">
                    @error('email')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                    @error('password')
                    <p class='text-danger inputerror'>{{ $message }} </p>
                    @enderror
                </div>
                {{-- <input type="hidden" name="token" value=""> --}}
      			<!-- submit button -->
    			<div class="d-grid">
        			<button class="btn btn-dark btn-lg enabled" id="submitButton" name="submit" type="submit">Submit</button>
      			</div>
                  <div class="mb-3 form-check">
                    
                    <label class="form-check-label" for="exampleCheck1">
                        <a href="forpass" style="color:black">Forgot Password</a>&nbsp;               
                        <a href="/home" style="color:black">Login as User</a>&nbsp;
                        <a href="#" style="color:black">New Here? SIGN UP!</a>
                    </label>
                </div>
  
            </form>
        </div>
        <br><br>
        
        @endsection

		
  		