@extends('layouts.adminapp')


@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin / Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf

                        <!-- Display success message using Bootstrap alert component -->
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <!-- Retrieve and display success message from Session object -->
                            {{ Session::get('success') }}
                        </div>
                        @endif
                        <!-- Name input -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"
                                    name="name" value="{{ old('name') }}" autocomplete="name">

                                @error('name')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Email input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control"
                                    name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                <small class="form-text text-danger">{{$message}}</small>

                                @enderror
                            </div>
                        </div>


                        <!-- Password input -->
                        <div class="form-group row">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control"
                                     autocomplete="new-password">

                                @error('password')
                                <small class="form-text text-danger">{{$message}}</small>

                                @enderror
                            </div>
                        </div>


                        <!-- Confirm Password input -->
                        <div class="form-group row">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Phone number input -->
                        <div class="form-group row">
                            <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text"
                                    class="form-control" name="phone_number"
                                    value="{{ old('phone_number') }}"  autocomplete="phone_number">

                                @error('phone_number')
                                <small class="form-text text-danger">{{$message}}</small>

                                @enderror
                            </div>
                        </div>


                        <!-- Gender select option -->
                        <div class="mb-3">

                            <label for="gender">Gender</label>
                            <select id="gender" class="form-control" name="gender">
                                
                                <option value="">Select gender</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                            <small class="form-text text-danger">{{$message}}</small>

                            @enderror
                        </div>





                        <!-- Department select option -->
                        <div class="form-group">
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
                        <div class="form-group">
                            <label for="role_id">Role</label>
                            <select id="role_id" class="form-control"
                                name="role_id">
                                <option value="">Select a role</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <small class="form-text text-danger">{{$message}}</small>

                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </form>



                </div>


                @endsection