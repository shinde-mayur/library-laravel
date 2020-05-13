@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>ADD STUDENTS</h4></div>
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

                    <form method="POST" action="{{route('student.add')}}">
                        @csrf
                       <div class="form-row">
                        <div class="form-group col-md-3">
    <label class="font-weight-bold"for="stud_id">Student ID</label>
    <input type="text"   class="form-control{{ $errors->has('stud_id') ? ' is-invalid' : '' }}" value="{{ old('stud_id') }}" name="stud_id" placeholder="Enter student ID">
    @if ($errors->has('stud_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stud_id') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group col-md-9">
    <label class="font-weight-bold"for="stud_name">Student Name</label>
    <input   type="text" class="form-control{{ $errors->has('stud_name') ? ' is-invalid' : '' }}" value="{{ old('stud_name') }}" name="stud_name" placeholder="Enter Student Name">
    @if ($errors->has('stud_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stud_name') }}</strong>
                                    </span>
                                @endif
  </div></div>
  <div class="form-row">    
  <div class="form-group col-md-5">
    <label class="font-weight-bold"for="stud_gender">Gender</label>
    <select name="stud_gender" class="custom-select form-control{{ $errors->has('stud_gender') ? ' is-invalid' : '' }}">
  <option value="" {{ old('stud_gender')==''?"Selected":"" }}>--Select Gender--</option>
  <option value="Male" {{ old('stud_gender')=='Male'?"Selected":"" }}>Male</option>
  <option value="Female" {{ old('stud_gender')=='Female'?"Selected":"" }}>Female</option>
  <option value="Other" {{ old('stud_gender')=='Other'?"Selected":"" }}>Other</option>
</select>
@if ($errors->has('stud_gender')) 
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stud_gender') }}</strong>
                                    </span>
                                @endif</div>

 <div class="form-group col-md-7">
    <label class="font-weight-bold"for="stud_class">Student Class</label>
    <select  name="stud_class" class="custom-select form-control{{ $errors->has('stud_class') ? ' is-invalid' : '' }}">
      <option value="" {{ old('stud_class')==''?"Selected":"" }}>--Select class--</option>
    <option value="Second Year" {{ old('stud_class')=='Second Year'?"Selected":"" }}>Second Year</option>      
    <option value="Third Year" {{ old('stud_class')=='Third Year'?"Selected":"" }}>Third Year</option>      
    <option value="Fourth Year" {{ old('stud_class')=='Fourth Year'?"Selected":"" }}>Fourth Year</option>      
</select>
    @if ($errors->has('stud_class'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stud_class') }}</strong>
                                    </span>
                                @endif
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label class="font-weight-bold"for="stud_contact">Contact</label>
    <input   type="text" class="form-control{{ $errors->has('stud_contact') ? ' is-invalid' : '' }}" value="{{ old('stud_contact') }}" name="stud_contact" placeholder="Enter Contact Details">
    @if ($errors->has('stud_contact'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stud_contact') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group col-md-6">
    <label class="font-weight-bold"for="stud_email">Email</label>
    <input   type="Email" class="form-control{{ $errors->has('stud_email') ? ' is-invalid' : '' }}" value="{{ old('stud_email') }}" name="stud_email" placeholder="Enter Email Address">
    @if ($errors->has('stud_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stud_email') }}</strong>
                                    </span>
                                @endif
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
    <label class="font-weight-bold"for="stud_addr">Address</label>
    <input   type="text" class="form-control{{ $errors->has('stud_addr') ? ' is-invalid' : '' }}" value="{{ old('stud_addr') }}" name="stud_addr" placeholder="Enter Address">
    @if ($errors->has('stud_addr'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stud_addr') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group col-md-4">
    <label class="font-weight-bold"for="stud_city">City</label>
    <input   type="text" class="form-control{{ $errors->has('stud_city') ? ' is-invalid' : '' }}" value="{{ old('stud_city') }}" name="stud_city" placeholder="Enter City">
    @if ($errors->has('stud_city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stud_city') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group col-md-3">
    <label class="font-weight-bold"for="stud_pin">Pincode</label>
    <input   type="text" class="form-control{{ $errors->has('stud_pin') ? ' is-invalid' : '' }}" value="{{ old('stud_pin') }}" name="stud_pin" placeholder="Enter Pincode">
    @if ($errors->has('stud_pin'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stud_pin') }}</strong>
                                    </span>
                                @endif
  </div>
  </div>
  <div class="form-group">
<button type="reset" name="managestudent" class="btn btn-link">Reset</button>
<button type="submit" name="managestudent" value="add" class="btn btn-success" >Add Student</button>
</div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection