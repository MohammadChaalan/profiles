@extends('layouts.app')
<!-- Extend the 'layouts.app' blade template -->

@section('content')
<!-- Define the 'content' section for the blade template -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>

                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <label for="name" class="form-label">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"
                                    name="name" value="{{ old('name') }}">

                                    @error('name')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label for="email" class="form-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control"
                                    name="email" value="{{ old('email') }}">

                                @error('email')
                                <small class="form-text text-danger">{{$message}}</small>

                                @enderror
                            </div>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label for="password" class="form-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control" name="password"
                                     autocomplete="new-password">

                                @error('password')
                                <small class="form-text text-danger">{{$message}}</small>

                                @enderror
                            </div>
                        </div>

                        <!-- Confrim Password input -->
                        <div class="form-outline mb-4">
                            <label for="password-confirm" class="form-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Phone number input -->
                        <div class="form-outline mb-4">
                            <label for="phone_number" class="form-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text"
                                    class="form-control" name="phone_number"
                                    value="{{ old('phone_number') }}" >

                                @error('phone_number')
                                <small class="form-text text-danger">{{$message}}</small>

                                @enderror
                            </div>
                        </div>


                        <!-- Gender select option -->
                        <div class="form-outline mb-4">

                            <label for="gender">Gender</label>
                            <select id="gender" class="form-control" name="gender"
                                >
                                <option value="">Select gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                            <small class="form-text text-danger">{{$message}}</small>

                            @enderror
                        </div>





                        <!-- Department select option -->
                        <div class="form-outline mb-4">
                            <label for="department_id">Department</label>
                            <select id="department_id" class="form-control"
                                name="department_id" >
                                <option value="">Select a department</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                            <small class="form-text text-danger">{{$message}}</small>

                            @enderror
                        </div>


                        <!-- Role select option -->
                        <div class="form-outline mb-4">
                            <label for="role_id">Role</label>
                            <select id="role_id" class="form-control"
                                name="role_id" >
                                <option value="">Select a role</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <small class="form-text text-danger">{{$message}}</small>

                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>



                </div>
                @endsection