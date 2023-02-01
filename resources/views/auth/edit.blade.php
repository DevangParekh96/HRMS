
@include('auth.header')
    <!-- Main content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
       <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
                  <!-- /.tab-pane -->
                  <!-- /.tab-pane -->
                    @foreach($employee as $emp)
                  
                    <div class="sson"></div>
                    <form class="form-horizontal"action="{{route('user.update',$emp->user_id)}}" method="post" enctype="multipart/form-data" style="width: 100%;">
                    @csrf
                    @method('PUT')
                    <h4>Personal Details</h4> 
                    

                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" value ="{{$emp->name}}"id="name" placeholder="Enter Name">
                        </div>
                      </div>
                      @error('name')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" name="email" class="form-control" id="email" value ="{{$emp->email}}" placeholder="Enater E-mail">
                        </div>
                      </div>
                      @error('email')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                          <input type="number" name="mno" class="form-control" value ="{{$emp->mno}}" id="phone" placeholder="Enter phone number"/>
                        </div>
                      </div>
                      @error('mno')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-10">
                          <input type="Date" name="dob" value ="{{$emp->dob}}"class="form-control" id="dob"/>
                        </div>
                      </div>
                      @error('dob')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                        <select name="gender" class="form-control"  required>
                          <option value ="{{$emp->gender}}">{{$emp->gender}}</option>  
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="others">Others</option>
                        </select>
                        </div>
                      </div>
                      @error('gender')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Address 1</label>
                        <div class="col-sm-10">
                          <textarea type="text" name="add1" class="form-control" id="stock"  placeholder="Enter Address" >{{$emp->add1}}</textarea>
                        </div>
                      </div>
                      @error('add1')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Address 2</label>
                        <div class="col-sm-10">
                          <textarea type="text" name="add2" class="form-control" id="stock" placeholder="Enter Address" >{{$emp->add2}}</textarea>
                        </div>
                      </div>
                      @error('add2')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <hr>
                        <h4>Employee Details</h4>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                          <input type="text" name="dept" class="form-control" id="dept"value ="{{$emp->dept}}" placeholder="Enter Department Name"/>
                        </div>
                      </div>
                      @error('dept')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Designation</label>
                        <div class="col-sm-10">
                          <input type="text" name="designation" class="form-control" id="desig" value ="{{$emp->designation}}"placeholder="Enter Your Designation"/>
                        </div>
                      </div>
                      @error('designation')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Date of Joining</label>
                        <div class="col-sm-10">
                          <input type="Date" name="doj" value ="{{$emp->doj}}"class="form-control" id="doj"/>
                        </div>
                      </div>
                      @error('doj')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Type of Job</label>
                        <div class="col-sm-10">
                        <select name="type" class="form-control" required>
                        <option selected="selected" value ="{{$emp->type}}">{{$emp->type}}</option>
                        <option value="Intern / Trainee">Intern / Trainee</option>
                          <option value="Full Time">Full Time</option>
                          <option value="Part Time">Part Time</option>
                        </select>
                        </div>
                      </div>
                      @error('type')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <hr>
                        <h4>Documents</h4>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label"> Profil Photo</label>
                        <div class="col-sm-10">
                          <input type="file" name="photo" class="form-control" id="photo" />
                        </div>
                      </div>
                      @error('photo')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label"> Aadhar Card</label>
                        <div class="col-sm-10">
                          <input type="file" name="id1" class="form-control" id="id1" />
                        </div>
                      </div>
                      @error('id1')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label"> Pan Card</label>
                        <div class="col-sm-10">
                          <input type="file" name="id2" class="form-control" id="id2" />
                        </div>
                      </div>
                      @error('id2')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label"> Driving Licence</label>
                        <div class="col-sm-10">
                          <input type="file" name="id3" class="form-control" id="id3" />
                        </div>
                      </div>
                      @error('id3')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Degree Certificate</label>
                        <div class="col-sm-10">
                          <input type="file" name="id4" class="form-control" id="id4" />
                        </div>
                      </div>
                      @error('id3')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <input type="submit" class="btn btn-danger" name="submit" value="submit"/>
                        </div>
                      </div>
                    </form>
                  </div>
                  @endforeach
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>