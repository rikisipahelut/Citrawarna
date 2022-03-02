@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Company</div>

                <div class="card-body">
                <form method="post" action="{{route('company.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="" aria-describedby="" name="name" value="{{old('name')}}">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                   <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input Logo</label>
                        <input class="form-control @error('logo') is-invalid @enderror" name="logo" type="file" id="formFile" value="{{old('logo')}}">
                        @error('logo')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                   </div>
                   <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Website</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" id="" aria-describedby="" value="{{old('website')}}">
                        @error('website')
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
@endsection