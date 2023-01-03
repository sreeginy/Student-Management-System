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

@php 
      $getpath = request()->route()->getName();
      $path = explode('.',$getpath)[0];
      $path1 = explode('.',$getpath)[1];
    @endphp 

    <section class="content-header">
        <div class="row mb-2">
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right mr-3">
              <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Home</a></li>
              <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/students">{{$path}}-page</a></li>
              <li class="breadcrumb-item"><a href="#">{{$path1}} </a></li>
          </ol>
        </div>
      </div>
     </div>
    </section>

  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"> STUDENT Re-CORRECTION FORM </h3>
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

<form action="{{route('students.update',$student->id)}} " method="post" enctype="multipart/form-data" >
          
          <!-- <input type="hidden" id="id" name="id" value="{{ $student->id}}"> -->
          
          @method('put')
      
          @csrf
      
     <!-- Image -->

          <div class="col-md-12 mt-4">
                    <div class="form-group">
                        <label class="form-control" for="file"><i class="fas fa-camera-retro"></i> &nbsp; &nbsp;Choose Profile Image </label>

                        <input type="file" enctype="multipart/form-data" name="file" onchange="previewFile(this)" />
              
                      <center> <img id="previewImg" alt="profile image" src="{{asset('/images')}}/{{$student->profileimage }}" style="max-width:250px;margin-top:15px;" /> </center>
                    </div>
          </div>
                                       
     <!-- first name -->
          <div class="col-md-12 ">
                    <div class="form-group">
                        <label  for="firstname">First Name : </label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user-edit" aria-hidden="true"></i></span>
                          </div>
                          <input type="text" class="form-control" id="firstname" name="firstname" value="{{$student->firstname}}" placeholder=" " aria-describedby="inputGroupPrepend"  >
                        </div><br>
                    </div>
          </div>

     <!--  last name  -->
           <div class="col-md-12 ">
                    <div class="form-group">
                        <label for="lastname">Last Name : </label>
                        <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-user-circle"  aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{$student->lastname}}" placeholder=" " aria-describedby="inputGroupPrepend">
                      </div><br>
                </div>
            </div>

    <!-- radio checks -->
            <div class="col-md-12 control-label">
                    <div class="form-group"> 
                        <label for="gender" >Gender : </label>
                            <label for="male"> &nbsp;
                                <input type="radio" name="gender"  id="male"  value="male" <?php if($student->gender=='male'){ echo "checked"; } ?>> Male
                            </label>
                            <label  for="female">&nbsp;
                                <input type="radio" name="gender" id="female" value="female" <?php if($student->gender=='female') { echo "checked"; }?>> Female
                            </label>
                    </div>
            </div>

      <!-- <?php echo print_r($student->subject); ?> -->

      <!-- subject -->

            <?php 
                  $sub=explode(',',$student->subject_name);
            ?>

            <div class="col-md-12 ">
                  <label for="subject_name"> Language :    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </label><br>
                  <div class="form-check form-check-inline-block">
                    <input type="checkbox" id="maths" name="subject_name[]" value="maths" <?php if(in_Array('maths',$sub)){ echo "checked" ;} ?>  >
                    <label for="maths"> Maths</label><br>
                    <input type="checkbox" id="english" name="subject_name[]" value="english" <?php if(in_Array('english',$sub)){ echo "checked" ;} ?> >
                    <label for="english"> English</label><br>
                    <input type="checkbox" id="sinhala" name="subject_name[]" value="sinhala" <?php if(in_Array('sinhala',$sub)){ echo "checked" ;} ?> >
                    <label for="sinhala"> Sinhala</label><br>
                    <input type="checkbox" id="other" name="subject_name[]" value="other" <?php if(in_Array('other',$sub)){ echo "checked" ;} ?> >
                  <label for="other"> Other</label> <br><br>
                </div>
                </div> 

      <!-- grade -->

            <div class="col-md-12 ">

                <div class="form-group">

                    <label  class="my-1 mr-2" for="grade_name">Grade Name : &nbsp;</label> 
                      <select id="grade_name" name="grade_name"  class="custom-select my-1 mr-sm-2">
                          
                        <!-- @foreach ($grades as $index=>$grade) 
                            <option value="{{ $index }}"  {{ $student->grade_name==$index ? 'selected' : '' }}>{{ $grade->name}}</option>
                        @endforeach
                </select><br> -->

                          <option value=" " selected >Select the ...</option> 
                          <option value="A "  <?php if($student->grade_name=="A"){ echo "selected"; }?> >A</option>
                          <option value="B "  <?php if($student->grade_name=="B"){ echo "selected"; }?> >B</option>
                          <option value="C "  <?php if($student->grade_name=="C"){ echo "selected"; }?> >C</option>
                          <option value="D "  <?php if($student->grade_name=="D"){ echo "selected"; }?> >D</option> -->
               </select> <br><br> 

                </div> 
                </div> 

      <!-- Text area -->
     
            <div class="col-md-12">
                          <div class="form-group"> <label for="address">Address : </label> 
                                  <textarea id="address" name="address"  class="form-control" rows="3" required="required" data-error="Please, leave us a message."  > {{$student->address}}</textarea> 
              </div> <br>

  <button type="submit" name="save" class="btn  btn-secondary  btn-block" value="save">UPDATE</button>
  </form>

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


     

   
          

 

