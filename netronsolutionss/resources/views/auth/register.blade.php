@extends('layout')
@section('content')
    <section class="py-1 h-100 h-100 d-flex justify-content-center align-items-center mt-4">
        <div class="container mt-5">
            @if (session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-sm p-3">
                            <div class="card-body">
                                
                                <div class="form-outline mb-4 text-center">
                                    <h3 class="pb-2">Register</h3>
                                    <small class="text-body-secondary">
                                        If you have an account, sign in with your email address.
                                    </small>
                                </div>
                                <input type="hidden" name="type" class="form-control" value="user" />
                                <input type="hidden" name="trashedd" class="form-control" value="0" />
                                <div class="form-outline mb-4">
                                    <select class="form-control" aria-label="Default select example" name="prefixname">
                                        <option selected>Open this select menu</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Ms">Ms</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <input type="text" name="firstname" class="form-control"
                                                placeholder="Enter To First Name" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <input type="text" name="middlename" class="form-control"
                                                placeholder="Enter To Middle Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <input type="text" name="lastname" class="form-control"
                                                placeholder="Enter To Last Name" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <input type="text" name="suffixname" class="form-control"
                                                placeholder="Enter To Suffix Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <input type="text" name="username" class="form-control"
                                                placeholder="Enter To User Name" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter To Email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <div class="input-group">
                                                <input type="password" id="typepass" class="form-control"
                                                    placeholder="Enter To Password" name="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline mb-4">
                                            <input type="file" name="photo" class="form-control" />
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary w-100">
                                    Register
                                </button>

                                <div class="form-outline mt-4">
                                    <p class="mb-0">Don't have an account?
                                        <a href="/" class="text-decoration-none fw-bold">Login</a>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
