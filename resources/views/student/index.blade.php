@include('include\header')


<!-- Content Header (Page header) -->
  @php 
      $getpath = request()->route()->getName();
      $path = explode('.',$getpath)[0];
      $path1 = explode('.',$getpath)[1];
  @endphp 

  <div class="container-fluid">
    <section class="content-header">
        <div class="row mb-2">
          <div class="col-sm-6"> </div>
          <div class="col-sm-6">   
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/">Home</a></li>
              <li class="breadcrumb-item"><a href="http://127.0.0.1:8000/students/create">{{$path}}-create</a></li>
              <li class="breadcrumb-item"><a href="#">{{$path1}}</a></li>
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
                        <h3 class="card-title">STUDENT INDEX FILE</h3>
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
                      <div class="row mt-4">
                          <div class="col-md-8 offset-md-2">
                            <form action="{{ route('students.index') }}" method="GET" role="search">
                              <div class="input-group mb-3">
                                  <input type="text" class="form-control  rounded-0 mr-0" name="term" placeholder="Search student firstname" id="term">
                                  <div class="btn-group">
                                      <button class="btn btn-info" type="submit" title="Search names">
                                                  <span class="fas fa-search"></span>
                                      </button>
                                      <a href="{{ route('students.index') }}" class=" mr-0">
                                      <button class="btn btn-outline-secondary" type="button" title="Refresh page">
                                                  <span class="fas fa-sync-alt"> </span> </a>
                                      </button>
                                  </div>
                              </div>
                           </form>
                        </div>
                     </div>
              </section><br>
             
                <div class="row mt-3 mr-2 ml-2">
                    <div class="col-12 ">
                        @if (session('status'))
                            <div class="alert alert-success">
                            {{ session('status') }}
                            </div>
                        @endif
                    </div>
                  </div>
      
          <div class="card-body ">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>#ID</th>
                    <th>PROFILE_IMAGE</th>
                    <th>FIRSTNAME</th>
                    <th>LASTNAME</th>
                    <th>GENDER</th>
                    <th>SUBJECT_NAME</th>
                    <th>GRADE_NAME</th>
                    <th>ADDRESS</th>
                    <th>Created_at</th>
                    <th><center> <i class="fas fa-trash-alt"></i> </th>
                    <th><center> <i class="fas fa-eye"></i> </th>
                    <th><center> <i class="fas fa-edit"></i> </th>
                    </tr>
                  </thead>
                   <tbody>
                    <tr>
                  @foreach ($students as $student)
                      <td> {{ $student->id}} </td>
                      <td><center> <img src="/images/{{ $student->profileimage }}" width="70px"> </center></td> 
                      <td>{{ $student->firstname}} </td>
                      <td>{{ $student->lastname}}</td>
                      <td>{{ $student->gender}}</td>
                      <td>{{ $student->subject_name}}</td>
                      <!-- <td>@foreach ($grades as $grade) {{ $grade->grade_name}}  @endforeach</td> -->
                      <td>{{$student->grade_name}}</td>
                      <td>{{ $student->address}}</td>
                      <td></td>
                      <td>
                    <form action="{{route('students.destroy',$student->id)}}" method="post">
                        @method('delete')
                        @csrf  
                            <button type="submit"  class="btn  btn-danger  btn-block text-dark" value="Delete"><i class="fas fa-trash-alt"></i>    Delete</button>
                    </form>
                      </td>

                          {{-- <td><a href="{{route('delete',$student->id)}}"><span class="fa fa-trash-o"></span> </a> </td> --}}

                      <td><a href=" {{route('students.show',$student->id)}}" class="btn btn-info btn-block text-dark" role="button" aria-pressed="true"><i class="fas fa-eye"></i> Show</a></td>
                      <td><a href=" {{route('students.edit',$student->id)}}" class="btn btn-success btn-block text-dark " role="button" aria-pressed="true"><i class="fas fa-edit"></i>&nbsp;Edit&nbsp;</a></td>
                     </tr>
                  @endforeach
                  </thead>
                    <tr>
                      <th>#ID</th>
                      <th>PROFILE IMAGE</th>
                      <th>FIRSTNAME</th>
                      <th>LASTNAME</th>
                      <th>GENDER</th>
                      <th>SUBJECT NAME</th>
                      <th>GRADE NAME</th>
                      <th>ADDRESS</th>
                      <th><center> <i class="fas fa-trash-alt"></i> </th>
                      <th><center> <i class="fas fa-eye"></i> </th>
                      <th><center> <i class="fas fa-edit"></i> </th>
                    </tr>
                  </thead>
                </table>
               
                {{-- Pagination --}}
                   <div class="d-flex justify-content-center mt-4 p-4">
                {!! $students->links() !!}
                
        </div>
  
    <!-- /.progress-group -->
      <div class="progress-group">
            Total students
                <span class="float-right"><b>  </b>&nbsp;/100</span>
            <div class="progress">
            <div class="progress-bar bg-secondary progress-bar-striped" role="progressbar"
                  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
              <span class="sr-only">40% Complete (success)</span>
            </div>
          </div>     
      </div>

    <!--create subject button -->
            <div class="col-md-12 ">
                   <a class="btn btn-outline-secondary float-right" href="http://127.0.0.1:8000/students/create" role="button"> &nbsp; CREATE STUDENT &nbsp; </a>                 
            </div>


@include('include\footer')


</div>

  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('js/app.js')}}"></script>
  </body>
  </html>