@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Employee Edit</div>

                <div class="card-body">
                <form method="post" action="{{route('employee.update',$employee->id)}}">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="" aria-describedby="" name="name" value="{{$employee->name}}">
                    </div>
                    
                   
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Company</label>
                        <select name="company" id="company"  class="form-control @error('company') is-invalid @enderror " value="{{old('company')}}">
                            <option value="">Choose Company</option>
                            @foreach($companies as $company)    
                                <option value="{{$company->id}}" {{ $company->id == $employee->company_id ? "selected" : "" }}>{{$company->name}}</option>
                            @endforeach
                            
                        </select>
                        @error('company')
                           <p class="text-danger">{{$message}}</p> 
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $employee->email}}">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection