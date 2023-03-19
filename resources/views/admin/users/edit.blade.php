@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">Admin Edit Profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.update',['id'=>$user->id]) }}">
                        @csrf


                         <!-- Display success message using Bootstrap alert component -->
                         @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            <!-- Retrieve and display success message from Session object -->
                            {{ Session::get('success') }}
                        </div>
                        @endif

                        
                        <!-- Name input -->
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

                        <!-- Email input -->
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

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <a href="{{route('profile.edit.password')}}">Go to update passwords</a>
                            </div>


                            <!-- Gender select option -->
                            <div class="form-outline mb-4">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">

                                    <select id="gender" class="form-control @error('gender') is-invalid @enderror"
                                        name="gender" required>
                                        <option value="{{$user->id}}">{{$user->gender}}</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male
                                        </option>
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


                            <!-- Phone input -->
                            <div class="form-outline mb-4">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                                <div class="col-md-6">
                                    <input id="phone" type="phone"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ $user->phone_number }}" required autocomplete="email">

                                    @error('Phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Department select option -->
                            <div class="form-outline mb-4">
                                <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>

                                <div class="col-md-6">
                                    <select id="department"
                                        class="form-control @error('department') is-invalid @enderror" name="department"
                                        required>
                                        <option value="{{$user->department->id}}">{{$user->department->name}}</option>
                                        @foreach($departs as $depart)
                                        <option value="{{$depart->id}}">{{$depart->name}}</option>
                                        @endforeach
                                        @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </select>
                                </div>
                            </div>


                            <!-- Role select option -->
                            <div class="form-outline mb-4">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

                                <div class="col-md-6">
                                    <select id="role" class="form-control @error('role') is-invalid @enderror"
                                        name="role" required>
                                        <option value="{{$user->role->id}}">{{$user->role->name}}</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                        @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </select>

                                </div>
                            </div>

                            <div class="form-outline mb-4">
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
@endsection