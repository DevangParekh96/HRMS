
    @extends('dashboard')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
		<div class="container" >
            <!-- Content here -->
            <form method="POST" action="{{ route('register.custom') }}" enctype="multipart/form-data">
                @csrf
                <div style="text-align: center;">
                    <p><h3>SIGN UP</h3></p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                @error('name')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                @error('email')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                @error('password')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select class="form-control" name="type">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>    
                </div>
                @error('type')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                <div class="mb-3">
                    <label class="form-label">Profile Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>
                @error('photo')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                <!-- submit button -->
    			<div class="d-grid">
        			<button class="btn btn-dark btn-lg enabled" type="submit">Register</button>
      			</div>
                  <div class="mb-3 form-check">
                    
                    <label class="form-check-label" for="exampleCheck1">             
                        <a href="{{ route('login') }}" style="padding-left:180px; color:black">Login</a>&nbsp;
                        <!-- <a href="/user.create" style="color:black">New Here? SIGN UP!</a> -->
                    </label>
                </div>
  
            </form>
        </div>
        <br><br>
        


		@endsection
  			