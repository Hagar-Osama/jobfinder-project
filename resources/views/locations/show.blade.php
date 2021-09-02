@extends('backend_layouts.layout')
@section('title')
Show | Location
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <h2>Locations</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>country</th>
                            <th>State</th>
                            <th>city</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$location->id}}</td>
                            <td>{{$location->country}}</td>
                            <td>{{$location->state}}</td>
                            <td>{{$location->city}}</td>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

@endsection
