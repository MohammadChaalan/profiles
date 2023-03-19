@extends('layouts.app')
<!-- Extending the app layout -->

@section('content')
<!-- Start of the content section -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <!-- Card header -->
                <div class="card-header">Edit Profile</div>

                <div class="card-body">
                    <!-- Profile update form -->
                    <form method="POST" action="{{ route('profile.update',['id'=>$user->id]) }}">
                        @csrf

                        
                        <!-- Display success message using Bootstrap alert component -->
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <!-- Retrieve and display success message from Session object -->
                            {{ Session::get('success') }}
                        </div>
                        @endif


                        <!-- Name field -->
                        <div class="form-outline mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email field -->
                        <div class="form-outline mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password field -->
                        <div class="form-outline mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <!-- Link to update password -->
                                <a href="{{route('profile.edit.password')}}">Go to update passwords</a>
                            </div>
                        </div>

                        <!-- Gender field -->
                        <div class="form-outline mb-4">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                            <div class="col-md-6">
                                <select id="gender" class="form-control @error('gender') is-invalid @enderror"
                                    name="gender" required>
                                    <option value="{{$user->gender}}">{{$user->gender}}</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-outline mb-4">
                            <!-- Phone label and input field -->
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ $user->phone_number }}" required autocomplete="email">

                                <!-- Error message if phone number is invalid -->

                                @error('Phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Department label and dropdown menu -->

                        <div class="form-outline mb-4">
                            <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>

                            <div class="col-md-6">
                                <select id="department" class="form-control @error('department') is-invalid @enderror"
                                    name="department" required>

                                    <!-- Current user department is selected by default -->

                                    <option value="{{$user->department->id}}">{{$user->department->name}}</option>

                                    <!-- Other department options -->

                                    @foreach($departs as $depart)
                                    <option value="{{$depart->id}}">{{$depart->name}}</option>
                                    @endforeach

                                    <!-- Error message if department is not selected -->

                                    @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </select>
                            </div>
                        </div>

                        <!-- Role label and dropdown menu -->

                        <div class="form-outline mb-4">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>


                            <!-- Current user role is selected by default -->

                            <div class="col-md-6">
                                <select id="role" class="form-control @error('role') is-invalid @enderror" name="role"
                                    required>
                                    <!-- Current user role is selected by default -->

                                    <option value="{{$user->role->id}}">{{$user->role->name}}</option>

                                    <!-- Other role options -->


                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                    <!-- Error message if role is not selected -->

                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </select>

                            </div>
                        </div>
                        <!-- Submit button for updating user information -->


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of form -->



@endsection