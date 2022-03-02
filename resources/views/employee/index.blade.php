@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Employee <a href="{{route('employee.create')}}">Tambah Employee</a></div>
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
                            <th scope="col">Company</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($employees as $employee)
                        <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->company->name}}</td>
                        <td><a href="{{route('employee.edit',$employee->id)}}">Edit</a></td>
                        <td>
                            <form action="{{route('employee.destroy',$employee->id)}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" name="submit" onclick="return confirm('yakin')">
                                    delete
                                </button>
                                
                                
                            </form>
                        </tr>
                    @endforeach
                  
                    </tbody>
                    </table>
                   


                    {!!$employees->links()!!}
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection