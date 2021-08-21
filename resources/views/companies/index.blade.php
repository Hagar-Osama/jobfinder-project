@extends('backend_layouts.layout')
@section('title')
Dashboard | Company
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="alert-success">
                {{session('success')}}
            </div>
            <div class='text-right'>
                <a href="{{route('companies.create')}}" class="btn btn-primary">Create New Company</a>
            </div>
            <h2>Companies</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>Phone</th>
                            <th>Job Name</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($companies)
                        @if($companies->count() > 0)
                        @endif
                        @endisset
                        @foreach($companies as $company)
                        <tr>
                            <td>{{$company->id}}</td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->location}}</td>
                            <td>{{$company->phone}}</td>
                            <td> @foreach ($company->jobs as $job)
                            {{ $job->name}}
                            @endforeach</td>
                            <td><a href="{{route('companies.show',['company'=>$company->id])}}" class="btn btn-warning">Show</a></td>
                            <td><a href="{{route('companies.edit',['company'=>$company->id])}}" class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action="{{route('companies.destroy', ['company'=>$company->id])}}" method="POST">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">

                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
