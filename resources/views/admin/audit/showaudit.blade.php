@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <h1>Audit Trails</h1><hr>
        <table class="table">
            <thead>



            <hr>

                <tr>
                    <th>Users_id</th>
                    <th>Field</th>
                    <th>Old Value</th>
                    <th>New value</th>
                    <th>Date of update</th>
                   

                </tr>
            </thead>
            <tbody>
                 <!-- Loop through each audit for 1 user and display their details -->
                @foreach($audit as $trail)
                    <tr>
                        <td>{{ $trail->user_id }}</td>
                        <td>{{ $trail->field }}</td>
                        <td>{{ $trail->old_value }}</td>
                        <td>{{ $trail->new_value }}</td>
                       
                        <td>{{ $trail->updated_at}}</td>

                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
