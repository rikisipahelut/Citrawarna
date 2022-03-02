@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Employee</div>

                <div class="card-body">
                <form method="post" action="{{route('employee.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="" aria-describedby="" name="name" value="{{old('name')}}">
                        @error('name')
                           <p class="text-danger">{{$message}}</p> 
                        @enderror
                    </div>
                   
                    <div class="mb-3">
                        <select name="company" id="company"  class="form-control" value="{{old('company')}}">
                            @foreach($companies as $company)    
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                        <label for="exampleInputEmail1" class="form-label">Company</label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        @error('email')
                           <p class="text-danger">{{$message}}</p> 
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================================================== -->
<script>
        $(document).ready(function() {
            $('#company').select2();
        });
</script>
@endsection