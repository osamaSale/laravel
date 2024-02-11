@extends('layout')
@section('content')
    <div class="container mt-2">
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
    </div>
@endsection
