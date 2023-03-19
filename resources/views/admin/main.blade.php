@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <h1>Users</h1><hr>
        <table class="table shadow">
            <thead>

            <a class="btn btn-warning btn-sm" href="{{route('admin.register.user')}}">Add New Users</a> |
            <a class="btn btn-warning btn-sm" href="{{route('admin.users.showaudit')}}">View Audit for all users</a> 




            <hr>

                <tr class="table-primary">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>Role</th>
                    <th>Date registration</th>
                    <th class="text-center">Action</th>

                </tr>
            </thead>
            <tbody>
                <!-- Loop through each user and display their details -->
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->department->name }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->created_at}}</td>

                        <td>
                            <!-- Links to edit, view, and view audit for user -->
                            <a class="btn btn-primary btn-sm" href="{{route('admin.users.edit',['id'=>$user->id])}}">Edit</a>
                            <a class="btn btn-warning btn-sm" href="{{route('admin.users.show',['id'=>$user->id])}}">View</a>
                            <a class="btn btn-warning btn-sm" href="{{route('admin.users.audit',['id'=>$user->id])}}">View audit</a>


                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
