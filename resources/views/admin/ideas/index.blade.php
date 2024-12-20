@extends('layout/layout')

@section('title','admin dashboard')


@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('admin/shared/leftSideBar')
            </div>
            <div class="col-9">
                <h1>Ideas dashboard</h1>

                <table class="table table-striped mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Content</th>
                            <th>Created At</th>
                            <th>#</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ideas as $idea)
                            <tr>
                                <td>{{ $idea->id }}</td>
                                <td>
                                    <a href="/users/{{$idea->user->id}}">{{ $idea->user->name }}</a>
                                </td>
                                <td>{{ $idea->content }}</td>
                                <td>{{ $idea->created_at->toDateString() }}</td>
                                <td>
                                    <a href="/ideas/{{ $idea->id }}"> View </a>
                                    <a href="/ideas/{{ $idea->id }}/edit" class="ms-1"> Edit </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $ideas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


