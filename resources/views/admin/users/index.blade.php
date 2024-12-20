@extends('layout/layout')

@section('title','admin dashboard')


@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('admin/shared/leftSideBar')
            </div>
            <div class="col-9">
                <h1>Users dashboard</h1>

                <table class="table table-striped mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined At</th>
                            <th>#</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->toDateString() }}</td>
                                <td>
                                    <a href="/users/{{ $user->id }}"> View </a>
                                    <a href="/users/{{ $user->id }}/edit" class="ms-1"> Edit </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


