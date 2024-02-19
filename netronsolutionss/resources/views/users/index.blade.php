@extends('layout')
@section('content')
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #299be4;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn {
            color: #566787;
            float: right;
            font-size: 13px;
            background: #fff;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn:hover,
        .table-title .btn:focus {
            color: #566787;
            background: #f2f2f2;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.settings {
            color: #2196F3;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .status {
            font-size: 30px;
            margin: 2px 2px 0 0;
            display: inline-block;
            vertical-align: middle;
            line-height: 10px;
        }

        .text-success {
            color: #10c469;
        }

        .text-info {
            color: #62c9e8;
        }

        .text-warning {
            color: #FFC107;
        }

        .text-danger {
            color: #ff5b5b;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>All List <b>Users</b></h2>
                        </div>
                        <div class="col-sm-7">
                            <form method="POST" action="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                @csrf
                                <a class="btn btn-outline-success" type="submit"> {{ __('Log Out') }}</a>
                            </form>

                            <a href="{{ route('users.create') }}" class="btn btn-secondary"><i
                                    class="material-icons">&#xE147;</i> <span>Add New
                                    User</span></a>
                            <a href="{{ route('users.allListTrashed') }}" class="btn btn-secondary"><i
                                    class="material-icons">&#xE24D;</i> <span>
                                    All List Trashed
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Email And UserName</th>
                            <th>Full Name</th>
                            <th>Suffix Name</th>
                            <th>Type</th>
                            <th>Action</th>
                            <th>Trashed</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if ($user->trashedd === '0')
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>

                                        @if ($user->photo)
                                            <a href="#">
                                                <img src="{{ $user->photo }}" class="rounded-circle" alt=""
                                                    style="width: 45px; height: 45px" />

                                            </a>
                                        @else
                                            <span>No image found!</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="">
                                                <p class="fw-bold mb-1">{{ $user->username }}</p>
                                                <p class="text-muted mb-0">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="fw-normal mb-1">{{ $user->prefixname }} {{ $user->firstname }}
                                            {{ $user->middlename }}</p>

                                    </td>
                                    <td>{{ $user->suffixname }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $user->id) }}" class="settings" title="Visibility"
                                            data-toggle="tooltip"><span class="material-icons"
                                                style="color: rgb(255, 210, 48);">visibility</span></a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="settings" title="Settings"
                                            data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i>
                                        </a>


                                    </td>
                                    <td>
                                        <form action="{{ route('users.trashed', $user->id) }}" method="Post">
                                            @csrf
                                            <input type="hidden" name="trashedd" value="1" />
                                            <button type="submit" class="btn btn-link" title="Delete"
                                                data-toggle="tooltip"><i class="material-icons"
                                                    style="color: rgb(18, 127, 55);"><v-icon>auto_delete</v-icon></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('users.delete', $user->id) }}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link" title="Delete"
                                                data-toggle="tooltip"><i class="material-icons"
                                                    style="color: rgb(255, 0, 0);">delete</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
