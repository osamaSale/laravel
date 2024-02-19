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
                            <h2>All List <b>Trashed</b></h2>
                        </div>
                        <div class="col-sm-7">

                            <a href="{{ route('users.index') }}" class="btn btn-secondary"><i
                                    class="material-icons">&#xE24D;</i> <span>
                                    All List Users
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if ($user->trashedd === '1')
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
                                        
                                        <form action="{{ route('users.trashed', $user->id) }}" method="Post">
                                            @csrf
                                            <input type="hidden" name="trashedd" class="form-control" value="0" />
                                            <button type="submit" class="btn btn-danger btn-sm">Restore</button>
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

    {{--  <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">

                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('users.index') }}"> Back</a>
                    <a class="btn btn-success" href="{{ route('users.allListTrashed') }}">All Trashed</a>
                </div>

            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="50px">S.No</th>
                    <th width="50px">Prefix</th>
                    <th width="50px">First</th>
                    <th width="50px">Middle</th>
                    <th width="50px">Last</th>
                    <th width="50px">Suffix</th>
                    <th width="50px">Name</th>
                    <th width="50px"> Email</th>
                    <th width="50px"> Photo</th>
                    <th width="50px">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    @if ($user->trashedd == '1')
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->prefixname }}</td>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->middlename }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->suffixname }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->photo)
                                    <img src="{{ $user->photo }}" style="height: 50px;width:100px;">
                                @else
                                    <span>No image found!</span>
                                @endif
                            </td>

                            <td>

                                <form action="{{ route('users.trashed', $user->id) }}" method="Post">
                                    @csrf
                                    <input type="hidden" name="trashedd" class="form-control" value="0" />
                                    <button type="submit" class="btn btn-danger btn-sm">Restore</button>
                                </form>
                            </td>
                        </tr>
                    @else
                    @endif
                @endforeach
            </tbody>
        </table>
        {{--     {!! $companies->links() !!} --}}
    </div> --}}
@endsection
