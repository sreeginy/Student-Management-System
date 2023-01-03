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
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">SUBJECT VIEW FORM</h3>
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
      <!-- Main content -->
      <section class="content">
          <div class="col-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div>
              <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-info text-lg text-dark">  SUBJECT SHOW </div>
              </div>
      <div class="container">
      <div class="row">
        <div class="col">
        <div class="tab-pane" id="settings">
            <form class="form-horizontal">
                <div class="form-group row">
              <div class="card-body p-4 mt-4">
              <hr>
                <strong><i class=" fas fa-audio-description mr-2"></i></strong> #ID: <strong class="float-right mr-4 text-primary"> {{ $subject->id}}  </strong>
                <hr>
                <strong><i class="fas fa-file-signature mr-2"></i> </strong> Subject Name  : <strong class="float-right mr-4 text-primary"> {{ $subject->name}} </strong>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-2"></i></strong>  Subject Order  : <strong class="float-right mr-4 text-primary"> {{ $subject->order}}  </strong>             
                <hr>
                <strong><i class="fas  fa-atlas  mr-2"></i></strong> Subject Height : <strong class="float-right mr-4 text-primary">{{ $subject->height}}  </strong>
                <hr>  
                
                <div class="btn-group mt-4">
                <a class="btn btn-app" href="http://127.0.0.1:8000/subjects"><i class="fas fa-hand-point-left"></i> Back </a>
                <a class="btn btn-app" href="{{route('subjects.edit',$subject->id)}}"><i class="fas fa-pen-nib"></i> Edit </a>
               </div>
              
            </div>
            </div>   
            
     </div>   
    </div>
 
   <!-- Profile Image -->
   <div class="col p-4" >
              <div class="card-body box-profile">
                <div class="text-center">
                <!-- Widget: user widget style 1 -->
                <div class="card card-info card-outline card-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header text-white mt-0.5"
                      style="background: url({{asset('img/photo1.png')}})center center;">
                    <h3 class="widget-user-username text-right">Elizabeth Pierce</h3>
                    <h5 class="widget-user-desc text-right">Web Designer</h5>
                  </div>
              <div class="widget-user-image mt-4">
                <!-- <img class="img-circle" src="/images/{{ $subject->profileimage }}" alt="User Avatar" > -->
                <img class="img-circle"        
                       src="/images/{{ $subject->profileimage }}" width="200%" height="110%"
                       alt="User profile picture">
              </div>
              <div class="card-footer ">
                <div class="row mt-4">
                  <div class="col-sm-4  border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
              </div>
          </div>
      </div>
    </div>
    
<!-- AdminLTE for demo purposes -->
  <script src="{{asset('js/app.js')}}"></script>
  </body>
  </html>