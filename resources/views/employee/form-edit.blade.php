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
                        <input type="number" min="1" max="3" class="form-control @error('company') is-invalid @enderror" id="" aria-describedby="" name="company" value="{{$employee->company_id}}">
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