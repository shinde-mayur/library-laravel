@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
  <div class="card-header">
    <h2 class="text-center">STUDENT DETAILS</h2>
  </div>
  <div class="card-body">
    @if(\Session::has('error'))
                    <div class="alert alert-danger">
                    {{\Session::get('error')}}
                    </div>
                    @endif
                    
                    @if(isset($students))
                    <div class="alert alert-success">
                            <?php echo 'Number of records found : '.count($students); ?>
                        </div>
    <form method="get" action="{{route('student.show')}}" class="form-inline col-md-12">
 <input type="text" class="form-control mb-2 col-sm-9 mr-sm-2" value="{{ old('search') }}" name="search" placeholder="Enter keyword to search...">
  <button type="submit" class="btn btn-outline-primary col-sm-2 mb-2">Search</button>
</form>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Contact</th>
                    <th>Email</th>
                    @if(auth()->user()->isAdmin == 1)
                    <th colspan="2">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr class="text-uppercase">
                    <td>{{$student->stud_id}}</td>
                    <td>{{$student->stud_name}}</td>
                    <td>{{$student->stud_class}}</td>
                    <td>{{$student->stud_contact}}</td>
                    <td>{{$student->stud_email}}</td>
                    @if(auth()->user()->isAdmin == 1)
                    <td><a href="{{route('student.edit',$student->stud_id)}}" class="btn btn-link">Edit</a></td>
            <td>
                <form action="{{route('student.delete',$student->stud_id)}}" method="get">
                  @csrf
                  <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </td>@endif
                </tr>
                @endforeach
 
            </tbody>
        </table>
        {{ $students->links() }}
        </div>
        @endif
  </div>
</div>
    </div>
    </div>
</div>
@endsection