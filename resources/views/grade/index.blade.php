<!-- <center>

    @foreach ($grades as $grade)

        {{ $grade->name}} 
        {{ $grade->order}} 
        {{ $grade->is_active}}  </td>

    @endforeach

    </center>

    -->


@include('include\header')

<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

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
          <div class="col-sm-6"></div>
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right ">
              <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Home</a></li>
              <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/grades/create">{{$path}}-create</a></li>
              <li class="breadcrumb-item"><a href="#">{{$path1}} </a></li>
            </ol>
           </div>
          </div>
        </div>
    </section>
  <!-- Main content -->
        <section class="content">
                <div class="row">
                  <div class="col-12">
                    <!-- Default box -->
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">GRADE INDEX FILE</h3>
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
    <section class="content mt-4">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                <form action="{{ route('grades.index') }}" method="GET" role="search">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control  rounded-0 mr-0" name="term" placeholder="Search grade name" id="term">
                        <div class="btn-group">
                          <button class="btn btn-info" type="submit" title="Search names">
                                   <span class="fas fa-search"></span>
                          </button>
                          <a href="{{ route('grades.index') }}" class=" mr-0">
                          <button class="btn btn-outline-secondary" type="button" title="Refresh page">
                                      <span class="fas fa-sync-alt"> </span> </a>
                          </button>
                       </div>
                    </div>
                </form>
              </div>
            </div>
          
    </section><br>
   
  <div class="container-fluid">
      <div class="col-12 mt-3 ">
          @if (session('status'))
              <div class="alert alert-success">
              {{ session('status') }}
              </div>
          @endif
      </div>

   <div class="card-body">
  
<table id="example"  class="table table-bordered table-striped">
      
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Profile</th>
                    <th>NAME</th>
                    <th>ORDER</th>
                    <th>IS ACTIVE</th>  
                    <th><center> <i class="fas fa-trash-alt"></i> </th>
                    <th><center> <i class="fas fa-eye"></i> </th>
                    <th><center> <i class="fas fa-edit"></i> </th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
           @foreach ($grades as $grade)
                      <td >{{ $grade->id}}</td>
                      <td><center> <img src="/images/{{ $grade->profileimage }}" width="70px"> </center></td>
                      <td >{{ $grade->name}} </td>
                      <td>{{ $grade->order}} </td>

                      <!-- <td>{{$grade->is_active}}</td> -->
                      <td><?php if($grade->is_active=="0"){ echo "No"; }?>
                          <?php if($grade->is_active=='1'){ echo "Yes"; } ?></td>

                      <td> 
                      <form action="{{route('grades.destroy',$grade->id)}}" method="post">
                      
                            @method('delete')
                            @csrf
                            
                            <center> <button type="submit" value="Delete" class="btn btn-app bg-danger text-dark">
                            <i class="fas fa-trash-alt"></i> DELETE </a>

                      </form> </td>
                            {{-- <td><a href="{{route('delete',$grade->id)}}"><span class="fa fa-trash-o"></span> </a> </td> --}}

                      <td> <center> 
                            <a href=" {{route('grades.show',$grade->id)}}" class="btn btn-app bg-info text-dark" role="button" aria-pressed="true">
                            <i class="fas fa-eye"></i> SHOW
                      </a> </td>

                      <td> <center> 
                            <a href="{{route('grades.edit',$grade->id)}}" class="btn btn-app bg-success text-dark" role="button" aria-pressed="true">
                            <i class="fas fa-edit"></i> EDIT
                      </a> </td>
            
                      </tr>
            @endforeach
                  <tfoot>
                   <tr>
                    <th>#ID</th>
                    <th>Profile</th>
                    <th>NAME</th>
                    <th>ORDER</th>
                    <th>IS ACTIVE</th>  
                    <th><center> <i class="fas fa-trash-alt"></i> </th>
                    <th><center> <i class="fas fa-eye"></i> </th>
                    <th><center> <i class="fas fa-edit"></i> </th>
                  </tr>
                  </tfoot>
                </table>
               
                {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-4 p-4">
                {!! $grades->links() !!}
            </div>
          
                 <!-- /.progress-group -->
                 <div class="progress-group">
                      Total students
                      <span class="float-right"><b>{{ $grade->count() }}</b>&nbsp;/100</span>
                    <div class="progress">
                  <div class="progress-bar bg-secondary progress-bar-striped" role="progressbar"
                       aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
         </div><br>

   <!--create grade button -->
        
          <div class="col-md-12 ">
                    <a class="btn btn-outline-secondary float-right" href="http://127.0.0.1:8000/grades/create" role="button"> &nbsp; CREATE GRADE &nbsp; </a>                 
          </div>

@include('include\footer')

</div>
    <!-- /.card-body -->

        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('js/app.js')}}"></script>

    </body>
    </html>
