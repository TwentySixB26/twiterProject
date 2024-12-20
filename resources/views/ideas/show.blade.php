@extends('layout/layout')

@section('title','show ideas')


@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared/leftSideBar')
            </div>
            <div class="col-6">

                {{-- diambil dari errorMessage atau successMessage --}}
                @include('shared/success')


                <hr>

                <div class="mt-3">
                    @include('ideas/shared/ideaCard')
                </div>
            </div>
            <div class="col-3">

                {{-- agar terkait dengan serach bar --}}
                @include('shared/searchBar')
                {{-- agar terkait dengan follow box --}}
                @include('shared/followBox')

            </div>
        </div>
    </div>
@endsection


