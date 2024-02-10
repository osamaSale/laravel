@extends('layout')
@section('title ', 'Login')
@section('content')
    <section class="py-5 h-100 h-100 d-flex justify-content-center align-items-center mt-4">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-sm p-3">
                        <div class="card-body">
                            <div class="form-outline mb-4 text-center">
                                <h3 class="pb-2">Login</h3>
                                <small class="text-body-secondary">
                                    If you have an account, sign in with your email address.
                                </small>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label"><i class="fa-solid fa-envelope me-1"></i> Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter To Email" />
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label"><i class="fa-solid fa-lock me-1"></i> Password</label>
                                <div class="input-group">
                                    <input type="password" id="typepass" class="form-control"
                                        placeholder="Enter To Password">
                                    <button class="input-group-text" onclick="Toggle()">
                                        <i class="fa fa-eye-slash toggle"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                Login
                            </button>

                            <div class="form-outline mt-4">
                                <p class="mb-0">Don't have an account?
                                    <a href="{{ route('create') }}" class="text-decoration-none fw-bold">Register</a>

                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



