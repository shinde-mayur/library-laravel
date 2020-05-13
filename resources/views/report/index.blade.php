@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center"><h3>REPORT</h3></div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="card-body">
                  <script type="text/javascript">
                    $(function(){
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  $('.nav-pills a').click(function (e) {
    $(this).tab('show');
    var scrollmem = $('body').scrollTop() || $('html').scrollTop();
    window.location.hash = this.hash;
    $('html,body').scrollTop(scrollmem);
  });
});
                  </script>
                    <ul class="nav nav-pills" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="issue-tab" data-toggle="tab" href="#issue" role="tab" aria-controls="issue" aria-selected="true">Issued Books</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="deposit-tab" data-toggle="tab" href="#deposit" role="tab" aria-controls="deposit" aria-selected="false">Returned Books</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="available-book-tab" data-toggle="tab" href="#available-book" role="tab" aria-controls="available-book" aria-selected="false">Available Books</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="issue" role="tabpanel" aria-labelledby="issue-tab">
    <div class="table-responsive">
    <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">ISSUE ID</th>
      <th scope="col">USER ID</th>
      <th scope="col">BOOK ID</th>
      <th scope="col">RETURN DATE</th>
    </tr>
  </thead>
  <tbody>
    @foreach($issued as $issue)
    <tr class="text-uppercase">
      <td>{{$issue->id}}</td>
      <td>{{$issue->user_id}}</td>
      <td>{{$issue->book_id}}</td>
      <td>{{$issue->return_date}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $issued->fragment('issue')->links() }}
</div>
  </div>
  <div class="tab-pane fade" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
    <div class="table-responsive">
    <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">DEPOSIT ID</th>
      <th scope="col">USER ID</th>
      <th scope="col">BOOK ID</th>
      <th scope="col">DELAY</th>
      <th scope="col">RETURNED TIME</th>
    </tr>
  </thead>
  <tbody>
    @foreach($deposits as $deposit)
    <tr class="text-uppercase">
      <td>{{$deposit->id}}</td>
      <td>{{$deposit->user_id}}</td>
      <td>{{$deposit->book_id}}</td>
      <td>{{$deposit->delay}}</td>
      <td>{{$deposit->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $deposits->fragment('deposit')->links() }}
</div>
  </div>
  <div class="tab-pane fade" id="available-book" role="tabpanel" aria-labelledby="available-book-tab">
    <div class="table-responsive">
      <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">BOOK ID</th>
      <th scope="col">BOOK NAME</th>
      <th scope="col">BOOK AUTHOR</th>
      <th scope="col">BOOK PUBLISHER</th>
    </tr>
  </thead>
  <tbody>
    @foreach($books as $book)
    <tr class="text-uppercase">
      <td>{{$book->book_id}}</td>
      <td>{{$book->book_name}}</td>
      <td>{{$book->book_author}}</td>
      <td>{{$book->book_publisher}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
    {{ $books->fragment('available-book')->links() }}
  </div>
  </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection