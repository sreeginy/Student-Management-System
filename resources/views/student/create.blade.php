@include('include\header')

<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Project Edit</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  
  
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">


  </head>
<body>
   <!-- Content Header (Page header) -->
    @php 
      $getpath = request()->route()->getName();
      $path = explode('.',$getpath)[0];
      $path1 = explode('.',$getpath)[1];
    @endphp 

    <section class="content-header">
        <div class="row mb-2">
          <div class="col-sm-6"> </div>
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right mr-3">
              <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Home</a></li>
              <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/students">{{$path}}-page</a></li>
              <li class="breadcrumb-item"><a href="#">{{$path1}}</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">STUDENT CREATE FORM </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">

<form action="{{route('students.store')}} " method="post" enctype="multipart/form-data">

   @csrf

  <!-- Image -->

  <div class="col-md-12 mt-4">
            <div class="form-group">
                <label class="form-control" for="file"><i class="fas fa-camera-retro"></i> &nbsp; &nbsp;Choose Profile Image </label>

                <input type="file" name="file" onchange="previewFile(this)"  class="@error('file') is-invalid @enderror"/>
      
               <!-- <center> <img id="previewImg" alt="profile image" style="max-width:250px;margin-top:15px;" /> </center> -->
            </div>
        </div>
    
  @error('file')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror <br>
  

  <!-- first name -->
  <div class="col-md-12 ">
    <label  for="firstname">First Name : </label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user-tag" aria-hidden="true"></i> &nbsp;</span>
      </div>
      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter the first name" aria-describedby="inputGroupPrepend"  class="@error('firstname') is-invalid @enderror">
    </div>
      
    @error('firstname')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror <br>
    </div>

    <!-- last name -->
    <div class="col-md-12 ">
        <label for="lastname">Last Name : </label>
        <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user-edit " aria-hidden="true"> &nbsp;</i></span>
            </div>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter the last name" aria-describedby="inputGroupPrepend" class="@error('lastname') is-invalid @enderror">
    </div>
        

    @error('lastname')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror 
    </div><br>

  <!-- radio checks -->
  <div class="col-md-12 control-label">
  <div class="form-group">
            <label for="gender" >Gender : </label>
                <div class="form-check form-check-inline-block">
                    <label for="male"> &nbsp;
                        <input  type="radio" name="gender" value="male" id="male"  /> Male
                    </label>
                  </div>
                <div class="form-check form-check-inline-block">
                    <label  for="female">&nbsp;
                        <input   type="radio" name="gender" value="female" id="female"/> Female
                    </label>
  </div>
  @error('gender')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror 
  </div>
  </div>

  <!-- subject -->

  <div class="col-md-12 ">
 
  <label for="subject_name">Subjects:</label><br>
  <div class="form-check form-check-inline-block">
                    <!-- @foreach ($subjects as $index=>$subject) 
                        <label><input type="checkbox" name="subject_name[]" value="{{ $index }}"> {{ $subject->name }} </label><br>
                    @endforeach
                    </select>
            </div> -->

        <label for="subject_name"> Subject Name :    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </label><br>
        <div class="form-check form-check-inline-block">
            <input type="checkbox" id="maths" name="subject_name[]" value="maths" class="@error('maths') is-invalid @enderror">
                <label for="maths"> Maths</label><br>
                <input type="checkbox" id="english" name="subject_name[]" value="english" class="@error('english') is-invalid @enderror">
                <label for="english"> English</label><br>
                <input type="checkbox" id="sinhala" name="subject_name[]" value="sinhala" class="@error('sinhala') is-invalid @enderror">
                <label for="sinhala"> Sinhala</label><br>
                <input type="checkbox" id="other" name="subject_name[]" value="other" class="@error('other') is-invalid @enderror">
                <label for="other"> Other</label><br>
       </select>
            </div> 

    @error('subject_name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </div><br>

  <!-- grade -->

  <div class="col-md-12 ">
  <div class="form-group">
  <!-- <label  class="my-1 mr-2" for="grade_name">Grade Name : &nbsp;</label> 
      <select id="grade_name" name="grade_name"  class="custom-select my-1 mr-sm-2">
            <option value disabled selected  class="@error('grade_name') is-invalid @enderror">Select Grade</option>
                        @foreach ($grades as $index=>$grade) 
                            <option value="{{ $index }}">{{ $grade->name}}</option>
                        @endforeach
      </select><br> -->
           
                <label  class="my-1 mr-2" for="grade_name">Grade Name : &nbsp;</label> 
                <select id="grade_name" name="grade_name"  class="custom-select my-1 mr-sm-2">
                    <option value=" " selected class="@error('grade_name') is-invalid @enderror"  >Select the ... </option>
                    <option value="A"  class="@error('grade_name') is-invalid @enderror"  >A</option>
                    <option value="B"  class="@error('grade_name') is-invalid @enderror"  >B</option>
                    <option value="C"  class="@error('grade_name') is-invalid @enderror"  >C</option>
                    <option value="D"  class="@error('grade_name') is-invalid @enderror"  >D</option>
              </select> 
    </div>


      @error('grade_name')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror 
      </div> <br>
    
   <!-- Text area --> 
     
      <div class="col-md-12">
        <div class="form-group">
         <label for="address">Address : </label> 
                <textarea id="address" name="address" class="form-control" placeholder="Write your address here." rows="3" required="required" data-error="Please, leave us a message."  class="@error('address') is-invalid @enderror"> </textarea> 
      </div>
       
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror 
        </div><br><br>

   <!-- save button -->
     <div class="col-md-12 ">
          <button type="submit" name="save" class="btn  btn-outline-secondary  btn-block" value="save">SAVE</button>
     </div> <br><br><br> 
                 
       </div>
     </form>
    </div>
  </div>

     
    
<script>
       function previewFile(input){
         var file=$("input[type=file]").get(0).files[0];
         if(file)
         {
           var reader = new FileReader();
           reader.onload = function() {
             $('#previewImg').attr("src",reader.result);
           }
           reader.readAsDataURL(file);
         }
       }
  </script>
</div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
   
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('js/app.js')}}"></script>
    </body>
    </html>

@include('include\footer')