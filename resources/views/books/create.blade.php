@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>ADD BOOKS</h4></div>
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

                    <form method="POST" enctype="multipart/form-data" action="{{route('book.add')}}">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-md-3 text-center">
                          <img id="book_cover" hidden class="rounded" height="150" width="100"/>     
                        </div>
                        <div class="form-group col-md-9">
                          <div class="custom-file">
                              <input type="file" accept=".png, .jpg, .jpeg" class="custom-file-input form-control{{ $errors->has('book_image') ? ' is-invalid' : '' }}" id="book_image" name="book_image" onchange="readURL(this);">
                              <script type="text/javascript">
       function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#book_cover')
                        .attr('src', e.target.result).attr('hidden',false);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<label class="custom-file-label " for="customFile">Choose Book Cover</label>
@if ($errors->has('book_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('book_image') }}</strong>
                                    </span>
                                @endif
                          </div>
                        </div>
                        </div>
                       <div class="form-row">
                        <div class="form-group col-md-3">
    <label class="font-weight-bold" for="book_id">Book ID</label>
    <input type="text"   class="form-control {{ $errors->has('book_id') ? ' is-invalid' : '' }}" value="{{ old('book_id') }}" name="book_id" placeholder="Enter Book ID">
    @if ($errors->has('book_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('book_id') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group col-md-9">
    <label class="font-weight-bold" for="book_name">Book Name</label>
    <input   type="text" class="form-control{{ $errors->has('book_name') ? ' is-invalid' : '' }}" value="{{ old('book_name') }}" name="book_name" placeholder="Enter Book Name">
    @if ($errors->has('book_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('book_name') }}</strong>
                                    </span>
                                @endif
  </div></div>

  <div class="form-row">
    <div class="form-group col-md-4">
    <label class="font-weight-bold" for="book_author">Author Name</label>
    <input   type="text" class="form-control{{ $errors->has('book_author') ? ' is-invalid' : '' }}" value="{{ old('book_author') }}" name="book_author" placeholder="Enter Author Name">
    @if ($errors->has('book_author'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('book_author') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group col-md-4">
    <label class="font-weight-bold" for="book_publisher">Publisher</label>
    <input   type="text" class="form-control{{ $errors->has('book_publisher') ? ' is-invalid' : '' }}" value="{{ old('book_publisher') }}" name="book_publisher" placeholder="Enter Publisher Name">
    @if ($errors->has('book_publisher'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('book_publisher') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group col-md-4">
    <label class="font-weight-bold" for="book_year">Publishing Year</label>
    <input   type="month" class="form-control{{ $errors->has('book_year') ? ' is-invalid' : '' }}" value="{{ old('book_year') }}" name="book_year" placeholder="Enter Publishing Year">
    @if ($errors->has('book_year'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('book_year') }}</strong>
                                    </span>
                                @endif
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
    <label class="font-weight-bold" for="book_price">Price</label>
    <input   type="text" class="form-control{{ $errors->has('book_price') ? ' is-invalid' : '' }}" value="{{ old('book_price') }}" name="book_price" placeholder="Enter Book Price">
    @if ($errors->has('book_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('book_price') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group col-md-9">
    <label class="font-weight-bold" for="book_date_added">Date Added</label>
    <input  type="date" class="form-control{{ $errors->has('book_date_added') ? ' is-invalid' : '' }}" value="{{ old('book_date_added') }}" name="book_date_added" placeholder="Enter Book Added Date">
    @if ($errors->has('book_date_added'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('book_date_added') }}</strong>
                                    </span>
                                @endif
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-3">
<button type="submit" name="addook" value="add" class="btn btn-success" >Add Book</button>
</div></div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection