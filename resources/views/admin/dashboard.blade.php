@extends('layout/layout')

@section('title','admin dashboard')


@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('admin/shared/leftSideBar')
            </div>
            <div class="col-9">
                <h1>admin dashboard</h1>

                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        @include('shared.widget',[
                            'title' => 'total Users' ,
                            'icon' => 'fas fa-users' ,
                            'data' => $totalUsers
                        ])
                    </div>
                    <div class="col-sm-6 col-md-4">
                        @include('shared.widget',[
                            'title' => 'total Idea' ,
                            'icon' => 'fas fa-lightbulb' ,
                            'data' => $totalIdeas
                        ])
                    </div>
                    <div class="col-sm-6 col-md-4">
                        @include('shared.widget',[
                            'title' => 'total Coment' ,
                            'icon' => 'fas fa-comment' ,
                            'data' => $totalComments
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


