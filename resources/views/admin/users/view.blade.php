@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            User details
                            <a class="btn btn-primary btn-sm float-end" href="{{url('users')}}">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label>Role</label>
                                <div class="p-2 border">
                                    {{ $users->role_as == '0' ? 'User' : 'Admin' }}
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>First Name</label>
                                <div class="p-2 border">
                                    {{ $users->name }}
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Last Name</label>
                                <div class="p-2 border">
                                    {{ $users->lname }}
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Email</label>
                                <div class="p-2 border">
                                    {{ $users->email }}
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Phone</label>
                                <div class="p-2 border">
                                    {{ $users->phone }}
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Address 1</label>
                                <div class="p-2 border">
                                    {{ $users->address1 }}
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Address 2</label>
                                <div class="p-2 border">
                                    {{ $users->address2 }}
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>City</label>
                                <div class="p-2 border">
                                    {{ $users->city }}
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>State</label>
                                <div class="p-2 border">
                                    {{ $users->state }}
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Country</label>
                                <div class="p-2 border">
                                    {{ $users->country }}
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label>Postal code</label>
                                <div class="p-2 border">
                                    {{ $users->postalcode }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
