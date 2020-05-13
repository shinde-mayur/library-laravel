@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
  <div class="card-header">
    <h2 class="text-center">BOOK DETAILS</h2>
  </div>
  <div class="card-body">
    @if(\Session::has('error'))
                    <div class="alert alert-danger">
                    {{\Session::get('error')}}
                    </div>
                    @endif
                    
                    @if(isset($books))
                    <div class="alert alert-success">
                            <?php echo 'Number of records found : '.count($books); ?>
                        </div>
    <form method="get" action="{{route('book.show')}}" class="form-inline col-md-12">
 <input type="text" class="form-control mb-2 col-md-9 mr-sm-2" value="{{ old('search') }}" name="search" placeholder="Enter keyword to search...">
  <button type="submit" class="btn btn-outline-primary col-md-2 mb-2">Search</button>
</form>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    @if(auth()->user()->isAdmin == 1)
                    <th colspan="2">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr class="text-uppercase">
                    <td >{{$book->book_id}}</td>
                    <td>{{$book->book_name}}</td>
                    <td>{{$book->book_author}}</td>
                    <td>{{$book->book_publisher}}</td>
                    @if(auth()->user()->isAdmin == 1)
                    <td><a href="{{route('book.edit',$book->id)}}" class="btn btn-link">Edit</a></td>
            <td>
                <form action="{{route('book.delete',$book->book_id)}}" method="get">
                  @csrf
                  <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </td>@endif
                </tr>
                @endforeach
 
            </tbody>
        </table>
        {{ $books->links() }}
        </div>
        @endif
  </div>
</div>
    </div>
    </div>
</div>
@endsection