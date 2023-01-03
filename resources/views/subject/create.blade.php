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
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right mr-3">
              <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Home</a></li>
              <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/subjects">{{$path}}-page</a></li>
              <li class="breadcrumb-item"><a href="#">{{$path1}}</a></li>
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
            <div class="card card-info"  style="background-color: #e3f2fd;">
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
          
<form action="{{route('subjects.store')}} " method="post" enctype="multipart/form-data">

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

    <!-- name -->
        <div class="col-md-12 ">
          <label  for="name">Subject Name : </label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-book" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" id="name" name="name" placeholder=" " aria-describedby="inputGroupPrepend"  class="@error('name') is-invalid @enderror">
          </div>
    
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror <br>
        </div>

   <!-- Color -->
        <div class="col-md-12 ">
            <label for="color">Subject Color : </label>
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-book" aria-hidden="true"></i></span>
                </div>
                <input type="text" class="form-control" id="color" name="color" placeholder=" " aria-describedby="inputGroupPrepend" class="@error('color') is-invalid @enderror">
            </div>
            

            @error('color')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror 
            </div><br>

   <!-- order -->
        <div class="col-md-12 ">
          <label  for="order">Subject Order : </label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-book" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" id="order" name="order" placeholder=" " aria-describedby="inputGroupPrepend"  class="@error('order') is-invalid @enderror">
          </div>
    
        @error('order')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror <br>
        </div>

    <!-- height -->
     <div class="col-md-12 ">
          <label  for="height">Subject Height : </label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-book" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" id="height" name="height" placeholder=" " aria-describedby="inputGroupPrepend"  class="@error('name') is-invalid @enderror">
          </div>
    
        @error('height')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror <br>
        </div><br><br>
        
       <!-- save button -->
      <div class="col-md-12 ">
                   <button type="submit" class="btn  btn-outline-info  btn-block" value="save">SAVE</button>             
       </div>
       <!-- <div class="col-md-12">
                <a class="btn btn-info" href="{{ route('subjects.index') }}" title="Go back"> <i class="fas fa-backward "> <span>GO BACK</i> </a>
    </div> -->

      </div>
      </div>
    </div>
    </div>
  </div>
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
  
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('js/app.js')}}"></script>
  </body>
  </html>






