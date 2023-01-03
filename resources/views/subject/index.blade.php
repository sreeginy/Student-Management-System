<!-- @foreach ($subjects as $subject)
           {{$subject->id}} 
           {{$subject->name}}
           {{$subject->color}}
           {{$subject->order}}
           {{$subject->height}}
     @endforeach -->




@include('include\header')

 

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
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Home</a></li>
              <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/subjects/create">{{$path}}-create</a></li>
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">SUBJECT INDEX FILE</h3>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                <form action="{{ route('subjects.index') }}" method="GET" role="search">
                      <div class="input-group mb-3">
                          <input type="text" class="form-control  rounded-0 mr-0" name="term" placeholder="Search subject name" id="term">
                          <div class="btn-group">
                            <button class="btn btn-info" type="submit" title="Search names">
                                        <span class="fas fa-search"></span>
                            </button>
                            <a href="{{ route('subjects.index') }}" class=" mr-0">
                            <button class="btn btn-outline-secondary" type="button" title="Refresh page">
                                        <span class="fas fa-sync-alt"> </span> </a>
                            </button>
                      </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </section><br>
<!--    
   <div class="d-flex justify-content-end mb-4 pull-center">
        <a class="btn btn-primary" href="{{route('generate-pdf',['download'=>'pdf']) }}">Export to PDF</a>
   </div> -->


    <div class="container-fluid">
    <div class="col-md-12 mt-3">
        @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
        @endif
    </div>
  
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th >#ID</th>
                    <th>Profile</th>
                    <th >Name</th>
                    <th>Colour</th>
                    <th >Order</th>
                    <th >Height</th>
                    <th><center> <i class="fas fa-trash-alt"></i> </th>
                    <th><center> <i class="fas fa-eye"></i> </th>
                    <th><center> <i class="fas fa-edit"></i> </th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
        @foreach ($subjects as $subject)
            <td> {{$subject->id}} </td>
            <td><center> <img src="/images/{{ $subject->profileimage }}" width="70px"> </center></td> 
            <td style="color:{{$subject->color}}">{{$subject->name}}</td>
            <td> {{$subject->color}}</td>

            <td> {{$subject->order}}</td>
            <td> {{$subject->height}}</td>
            <td>
        <form action="{{route('subjects.destroy',$subject->id)}}" method="post">
            @method('delete')
            @csrf
                    <!-- <input type="submit" value="Delete"> -->
                    <center> <button type="submit" value="Delete" class="btn btn-app bg-danger text-dark">
                            <i class="fas fa-trash-alt"></i> DELETE </a>
        </form>
            
            </td>
                {{-- <td><a href="{{route('delete',$subject->id)}}"><span class="fa fa-trash-o"></span> </a> </td> --}}

            <td> <center> 
                <a href="{{route('subjects.show',$subject->id)}}" class="btn btn-app bg-info text-dark" role="button" aria-pressed="true">
                <i class="fas fa-eye"></i> SHOW
                </a> </td>

           <td> <center> 
                <a href="{{route('subjects.edit',$subject->id)}}" class="btn btn-app bg-success text-dark" role="button" aria-pressed="true">
                <i class="fas fa-edit"></i> EDIT
                </a> </td>
            
            </tr>
       @endforeach  
            <tfoot> 
                  <tr>
                  <th>#ID</th>
                  <th>Profile</th>
                  <th >Name</th>
                    <th>Colour</th>
                    <th >Order</th>
                    <th >Height</th>
                    <th><center> <i class="fas fa-trash-alt"></i> </th>
                    <th><center> <i class="fas fa-eye"></i> </th>
                    <th><center> <i class="fas fa-edit"></i> </th>
                  </tr>
                  </tfoot>
                </table>

                {{-- Pagination --}}
                   <div class="d-flex justify-content-center mt-4 p-4">
                {!! $subjects->links() !!}
        </div>
        <br> 
                <!-- /.progress-group -->
                <div class="progress-group">
                      Total Subjects
                      <span class="float-right"><b>{{ $subject->count() }}</b>&nbsp;/100</span>
                    <div class="progress">
                  <div class="progress-bar bg-secondary progress-bar-striped" role="progressbar"
                       aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
      </div>
     </div>

  <!--create subject button -->
          <div class="col-md-12 ">
                <a class="btn btn-outline-secondary float-right" href="http://127.0.0.1:8000/subjects/create" role="button"> &nbsp; CREATE SUBJECT &nbsp; </a>                 
          </div>

@include('include\footer')

   </div> <!-- /.card-body -->
      
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('js/app.js')}}"></script>
      </body>
      </html>
