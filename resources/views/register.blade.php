@extends('layouts.master')
@section('title','Sign Up')
@section('content')
{{-- <main class="main-content  mt-0"> --}}
{{-- <section> --}}
<div class="page-header min-vh-75">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                <div class="card card-plain mt-4">
                    <div class="card-header pb-0 text-left bg-transparent">
                        <h3 class="font-weight-bolder text-info text-gradient">Register Here</h3>
                        <p class="mb-0">Fast and hassle free registration</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/') }}/register/client">
                            @csrf
                            <label>User Name</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="user_name" id="user_name" required
                                    placeholder="First Name" aria-label="User Name"
                                    aria-describedby="first-name-addon">
                            </div>
                            <label>Email</label>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" id="email" required
                                    placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <label>Password</label>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" id="password" required
                                    placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                            </div>
                            <label>Phone No</label>
                            <div class="mb-3 d-flex">
                                <select name="country_code" class="form-control" style="width: 30em" id="country_code">
                                    <option value="">{{ __('select') }}</option>
                                    @foreach($countryCodes as $c)
                                        <option value="+{{ $c->code }}">+{{ $c->code }}({{ $c->name }})</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" style="width: 70em" name="phone" id="phone"
                                    required placeholder="Phone No" aria-label="Phone No"
                                    aria-describedby="phone-no-addon">
                            </div>
                            @if(Auth::check() && $path=='any')
                                <label for="role">Role</label>
                                <div class="mb-3">
                                    <select name="role" class="form-control" id="role">
                                        <option value="">{{ __('select') }}</option>
                                        @foreach($roles as $r)
                                            <option value="{{ $r->name }}">{{ $r->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('role')
                                    <span style="color: red">{{ $message }}</span>
                                    <br>
                                @enderror
                            @endif
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign up</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-4 text-sm mx-auto">
                            Already have an account?
                            <a href="{{ route('userlogin') }}"
                                class="text-info text-gradient font-weight-bold">Sign in</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                    <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                        style="background-image:url('{{ url('/') }}/assets/img/curved-images/curved6.jpg')">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- </section> --}}
{{-- </main> --}}
@endsection
