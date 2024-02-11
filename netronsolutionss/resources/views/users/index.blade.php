@extends('layout')
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.create') }}"> Create User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.allListTrashed') }}">All List Trashed</a>
                </li>

            </ul>
            <form class="d-flex" method="POST" action="{{ route('logout') }}" onclick="event.preventDefault();
            this.closest('form').submit();">
                @csrf
                <a class="btn btn-outline-success" type="submit">  {{ __('Log Out') }}</a>
              </form>
        </div>
    </div>
</nav>
@section('content')

    <div class="container mt-4">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>S.No</th>
                    <th>Photo</th>
                    <th>Email And UserName</th>
                    <th>Full Name</th>
                    <th>Suffix Name</th>
                    <th> Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if ($user->trashedd === '0')
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                @if ($user->photo)
                                    <img src="{{ $user->photo }}" class="rounded-circle" alt=""
                                        style="width: 45px; height: 45px" />
                                @else
                                    <span>No image found!</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center">

                                    <div class="">
                                        <p class="fw-bold mb-1">{{ $user->username }}</p>
                                        <p class="text-muted mb-0">{{ $user->username }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-normal mb-1">{{ $user->prefixname }} {{ $user->firstname }}
                                    {{ $user->middlename }}</p>

                            </td>
                            <td>
                                <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
                            </td>
                            <td>{{ $user->suffixname }}</td>
                            <td>
                           

                            <div class="hstack gap-3">
                                <div>
                                    <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                </div>
                                <div>
                                    <a class="btn btn-warning btn-sm" href="{{ route('users.show', $user->id) }}">Show</a>
                                </div>
                                <div>
                                    <form action="{{ route('users.delete', $user->id) }}" method="Post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                                <div>
                                    <form action="{{ route('users.trashed', $user->id) }}" method="Post">
                                        @csrf
                                        <input type="hidden" name="trashedd" class="form-control" value="1" />
                                        <button type="submit" class="btn btn-danger btn-sm">Trashed</button>
                                    </form>
                                </div>
                            </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        {{--     {!! $companies->links() !!} --}}
    </div>
@endsection
