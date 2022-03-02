@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Company</div>

                <div class="card-body">
                <form method="post" action="{{route('company.update',$details[0])}}" enctype="multipart/form-data">
                @method('put')   
                @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="" aria-describedby="" name="name" value="{{$details[0]->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$details[0]->email}}">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                   <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input Logo</label>
                        <input class="form-control @error('logo') is-invalid @enderror"" name="logo" type="file" id="formFile" value="{{$details[0]->logo}}">
                   </div>
                   <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Website</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror"" name="website" id="" aria-describedby="" value="{{$details[0]->website}}">
                   </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection