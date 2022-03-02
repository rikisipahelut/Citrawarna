@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Company <a href="{{route('company.create')}}">Tambah Company</a></div>
                    @if(session('status'))
                        <div class="alert alert-success mt-2">
                            {{session('status')}}
                        </div>
                    @endif
                
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Website</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($companies as $company)
                        <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td><img src="/image/company/{{$company->logo}}" alt="$company->logo" width="100" height="100"></td>
                        <td>{{$company->website}}</td>
                        <td><a href="{{route('company.edit',$company->id)}}">Edit</a></td>
                        <td>
                            <form action="{{route('company.destroy',$company->id)}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" name="submit" onclick="return confirm('yakin')">
                                    delete
                                </button>
                                <!-- <a type="submit" href="{{route('company.destroy',$company->id)}}" onclick="return confirm('yakin')">Delete</a></td> -->
                                
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                   
               
                {!!$companies->links()!!}



                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection