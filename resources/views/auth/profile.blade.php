
@include('auth.header')
<!-- Content Wrapper. Contains page content -->
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
                    <div class="sson"></div>
                 
                    <form class="form-horizontal"action="{{route('update_user')}}" method="post" enctype="multipart/form-data" style="width: 100%;">
                    @csrf
                    <div class="col-sm-10">
                      <h4>Personal Details</h4> 
                    </div>
                    <div class="col-sm-10">
                      <center><img src="/file/{{$user->photo}}"style="border-radius:50% ;   " height="160px" width="150px"/></center>
                    <br><div class="form-group row">
                     
                    <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}"placeholder="Enter Name">
                        </div>
                      </div>
                      @error('name')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}" placeholder="Enater E-mail">
                        </div>
                      </div>
                      @error('email')
                <p class='text-danger inputerror'>{{ $message }} </p>
                @enderror
                     
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
                        <div class="offset-sm-2 col-sm-10">
                          <input type="submit" class="btn btn-danger" name="submit" value="submit"/>
                        </div>
                      </div>
                    </form>
                  </div>
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
  <?php include"footer.php"?>
