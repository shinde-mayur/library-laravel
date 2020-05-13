@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Issue or Deposit book</h4></div>
                  @if(\Session::has('error'))
                    <div class="alert alert-danger">
                    {{\Session::get('error')}}
                    </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="card-body">
                    <form method="POST" action="/home">
                        @csrf
                        <div class="form-group">
    <label for="book_id">Book ID</label>
    <input type="text" class="form-control{{ $errors->has('book_id') ? ' is-invalid' : '' }}" value="{{ old('book_id') }}" name="book_id" placeholder="Enter book id">
    @if ($errors->has('book_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('book_id') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group">
    <label for="user_id">Student ID</label>
    <input type="text" value="{{ old('user_id') }}" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id" placeholder="Enter student id">
    @if ($errors->has('user_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group">
<div class="form-check">
  <input class="form-check-input" type="radio" name="book_action" id="issue" value="issue" checked>
  <label class="form-check-label" for="issue" >
    Issue book
  </label>
</div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="book_action" id="deposit" value="deposit" >
  <label class="form-check-label" for="deposit">
    Deposit book
  </label>

</div></div>

<div class="form-group">
    <button type="reset" class="btn btn-link">
                                    Reset
                                </button>
<button type="submit" class="btn btn-outline-success" >Issue / Deposit</button>
</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection