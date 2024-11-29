@extends('layout/layout')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared/leftSideBar')
            </div>
            <div class="col-6">

                {{-- diambil dari errorMessage atau successMessage --}}
                @include('shared/success')

                {{-- diambil melalui file submitIdea --}}
                @include('ideas/shared/submitIdea')



                <hr>
                {{-- pengulangan agar menampilkan semua data yang ada di database  --}}

                {{-- jika data ada--}}
                @if (count($ideas) > 0)
                    @foreach ($ideas as $idea)
                    <div class="mt-3">
                        @include('ideas/shared/ideaCard')
                    </div>
                    @endforeach
                {{-- jika data tidak ada --}}
                @else
                    Pencarian "{{ request('search') }}" tidak ditemukan.
                @endif



                {{-- pagination --}}
                <div class="mb-3">
                    {{ $ideas->withQueryString()->links() }}
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


