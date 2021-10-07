@extends('backend_layouts.layout')
@section('title')
Dashboard | Contact
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class='text-right'>
                <a href="{{route('contacts.create')}}" class="btn btn-primary">Create New Message</a>
            </div>
            @include('includes.alert')

            <h2>Contact Us</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($contacts)
                        @if($contacts->count() > 0)
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{$contact->id}}</td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->phone}}</td>
                            </td>

                        </tr>
                        @endforeach
                        @endif
                        @endisset
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
