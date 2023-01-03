@include('include\header')

<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>AdminLTE 3 | Fixed Footer Layout</title>

      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    
      <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
      </head>
      <style>
      .btn-group{
        margin-left:180px;
      }
      .content1{
        margin-left:250px;
      }
      </style>

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
                <h3 class="card-title">STUDENT VIEW FORM</h3>
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

<div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
      
            <div class="card card-outline-info card-outline card-outline-tabs">
              <div class="card-header d-flex p-0  border-bottom-0">
                <h3 class="card-title p-3"></h3>
                <ul class="nav nav-pills mr-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Tab 1</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Tab 2</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab 3</a></li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-info text-lg text-dark">  STUDENT SHOW </div>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                  <div class="container">
      <div class="row">
        <div class="col">
        <div class="tab-pane" id="settings">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info p-2 mt-4">
                <div class="widget-user-image">
                  <!-- <img class="img-circle elevation-2" src="/images/{{ $student->profileimage }}" alt="User Avatar"  width="100px " height="110px"> -->
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username text-dark text-center"> {{ $student->firstname}} </h3>
                <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
              </div>
            <form class="form-horizontal mt-2">
                <div class="form-group row">
              <div class="card-body ">
              <hr>
                <strong><i class="fa fa-id-card mr-2"></i></strong> #ID: <strong class="float-right mr-4 text-primary"> {{ $student->id}}  </strong>
                <hr>
                <strong><i class="fas fa-file-signature mr-2"></i> </strong> First Name  : <strong class="float-right mr-4 text-primary"> {{ $student->firstname}} </strong>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-2"></i></strong>  Last Name  : <strong class="float-right mr-4 text-primary">  {{ $student->lastname}} </strong>             
                <hr>
                <strong><i class="fas fa-venus-mars mr-2"></i></strong> Gender : <strong class="float-right mr-4 text-primary">{{ $student->gender}} </strong>
                <hr>
                <strong><i class="fas fa-atlas mr-2"></i></strong> Subject Name : <strong class="float-right mr-4 text-primary">{{ $student->subject_name}} </strong>
                <hr>
                <strong><i class="fas fa-audio-description mr-2"></i></strong> Grade Name : <strong class="float-right mr-4 text-primary"> {{ $student->grade_name}} </strong>
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-2"></i></strong> Address : <strong class="float-right mr-4 text-primary"> {{ $student->address}}  </strong>
                <hr>    
                
                <div class="btn-group mt-4">
                <a class="btn btn-app" href="http://127.0.0.1:8000/students"><i class="fas fa-hand-point-left"></i> Back </a>
                <a class="btn btn-app" href="{{route('students.edit',$student->id)}}"><i class="fas fa-pen-nib"></i> Edit </a>
               </div>         
              </div>
            </div>
            </div>
            <!-- /.card -->
            
    </div>
        <!-- Profile Image -->
        <div class="col p-4">
            <div class="card card-info card-outline p-2">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile img-circle card-outline"        
                       src="/images/{{ $student->profileimage }}" width="200px " height="210px"
                       alt="User profile picture">
                </div><br>

                <h3 class="profile-username text-center">{{ $student->firstname}} <span> {{ $student->lastname}} </h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-4">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">13,287</a>
                  </li>
                </ul>
                <a href="#" class="btn btn-outline-info btn-block"><b>Follow</b></a>
              </div>
    <!-- /.card-body -->

        </div>
      </div>
     </div>
    </div>

  </div>
  <!-- /.tab-pane -->
  <div class="tab-pane" id="tab_2">
  <div class="container">
      <div class="row">
        <div class="col">
        <div class="tab-pane" id="settings">
             <!-- Add the bg color to the header using any of the bg-* classes -->
             <div class="widget-user-header bg-info p-2 mt-4">
                <div class="widget-user-image">
                  <!-- <img class="img-circle elevation-2" src="/images/{{ $student->profileimage }}" alt="User Avatar"  width="100px " height="110px"> -->
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username text-dark text-center"> {{ $student->firstname}} </h3>
                <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
              </div>
            <form class="form-horizontal">
                <div class="form-group row">
              <div class="card-body p-4">
              <hr>
                <strong><i class="fa fa-id-card mr-2"></i></strong> #ID: <strong class="float-right mr-4 text-primary"> {{ $student->id}}  </strong>
                <hr>
                <strong><i class="fas fa-file-signature mr-2"></i> </strong> First Name  : <strong class="float-right mr-4 text-primary"> {{ $student->firstname}} </strong>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-2"></i></strong>  Last Name  : <strong class="float-right mr-4 text-primary">  {{ $student->lastname}} </strong>             
                <hr>
                <strong><i class="fas fa-venus-mars mr-2"></i></strong> Gender : <strong class="float-right mr-4 text-primary">{{ $student->gender}} </strong>
                <hr>
                <strong><i class="fas fa-atlas mr-2"></i></strong> Subject Name : <strong class="float-right mr-4 text-primary">{{ $student->subject_name}} </strong>
                <hr>
                <strong><i class="fas fa-audio-description mr-2"></i></strong> Grade Name : <strong class="float-right mr-4 text-primary"> {{ $student->grade_name}} </strong>
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-2"></i></strong> Address : <strong class="float-right mr-4 text-primary"> {{ $student->address}}  </strong>
                <hr>    <br>
                <div class="content1">
                <div class="btn-group mt-4">
                <a class="btn btn-app" href="http://127.0.0.1:8000/students"><i class="fas fa-hand-point-left"></i> Back </a>
                <a class="btn btn-app" href="{{route('students.edit',$student->id)}}"><i class="fas fa-pen-nib"></i> Edit </a>
               </div>         
              </div>
              </div>
            </div>
            </div>
            <!-- /.card -->  
           </div>
          </div>
         </div>
      </div>
      <!-- /.tab-pane -->
   <div class="tab-pane" id="tab_3">
                    <!-- Profile Image -->
        <div class="col p-4">
            <div class="card card-info card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile img-circle card-outline"        
                       src="/images/{{ $student->profileimage }}" width="200px " height="210px"
                       alt="User profile picture">
                </div><br>

                <h3 class="profile-username text-center">{{ $student->firstname}} <span> {{ $student->lastname}} </h3>

                <p class="text-muted text-center">Software Engineer</p>
       <!-- Social sharing buttons -->

                <button type="button" class="btn btn-outline-secondary btn-sm"><i class="fas fa-share"></i> <b>Share</b></button>
                <button type="button" class="btn btn-outline-secondary btn-sm"><i class="far fa-thumbs-up"></i> <b>Like</b></button>
                <span class="float-right text-muted"><b>1045 likes - 102 comments </b></span>

                <ul class="list-group list-group-unbordered mb-4 mt-2">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">13,287</a>
                  </li>
                </ul>
                <a href="#" class="btn btn-outline-info btn-block"><b>Follow</b></a>
              </div>
    <!-- /.card-body -->
    </div>
    </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

                         
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>

<!-- -user-img img-fluid -->