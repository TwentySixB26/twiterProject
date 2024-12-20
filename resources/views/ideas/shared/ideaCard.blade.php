<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                src="{{ $idea->user->getImageUrl() }}"  alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="users/{{ $idea->user->id  }}"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>

                {{-- form dibuat agar ketika button diklik akan melakukan delete  --}}
                <form action="/ideas/{{$idea['id']  }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm">X</button>
                </form>
                {{--akhir form dibuat agar ketika button diklik akan melakukan delete  --}}

                {{-- tombol view atau show preview --}}
                <a href="/ideas/{{ $idea['id'] }}"> View </a>

                <br>
                {{-- tombol edit     --}}
                <a href="/ideas/{{ $idea['id'] }}/edit"> Edit </a>

            </div>
        </div>
    </div>
        <div class="card-body">
            {{-- ketika view edit diakses maka akan menampilkan hasil form tapi jika tidak diakses maka yang akan tampil adalah bagian else --}}
            @if ($editing ?? false )
                <form action="/ideas/{{ $idea['id'] }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea class="form-control" id="content" rows="3" name="content">{{ $idea->content }}</textarea>
                        @error('content')
                            <span class="fs-6 text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="">
                        <button class="btn btn-dark" type="submit"> Share </button>
                    </div>
                </form>
            @else
                <p class="fs-6 fw-light text-muted">
                    {{-- data diambil dari data base yaitu tabel ideas karena yang dikirim dari controller adalah Models tersbut  --}}
                    {{ $idea->content }}
                </p>
            @endif
            {{-- akhir --}}


            <div class="d-flex justify-content-between">
                @include('ideas.shared.like-button')
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span> {{ $idea->created_at->diffForHumans()  }}</span>
                </div>
            </div>

            @include('ideas/shared/coments')
        </div>
</div>







