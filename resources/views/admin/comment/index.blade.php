@extends('layout/layout')

@section('title','admin dashboard')


@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('admin/shared/leftSideBar')
            </div>
            <div class="col-9">
                <h1>Coments dashboard</h1>
                @include('shared.success')
                <table class="table table-striped mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Idea</th>
                            <th>Content</th>
                            <th>Created At</th>
                            <th>#</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($comments as $coment)
                            <tr>
                                <td>{{ $coment->id }}</td>
                                <td>
                                    <a href="/users/{{$coment->user->id}}">{{ $coment->user->name }}</a>
                                </td>
                                <td>
                                    <a href="/ideas/{{ $coment->idea->id }}"> {{ $coment->idea->id }} </a>
                                </td>
                                <td>{{ $coment->coment }}</td>
                                <td>{{ $coment->created_at->toDateString() }}</td>
                                <td>
                                    <form action="/admin/coments/{{$coment->id}}/delete" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Delete Coment</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


