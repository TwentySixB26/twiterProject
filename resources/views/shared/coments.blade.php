
<div>
    <form action="/ideas/{{ $idea->id }}/coments" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="fs-6 form-control" rows="1" name="coment"></textarea>
        </div>
        <div>
            <button class="btn btn-primary btn-sm" type="submit"> Post Comment </button>
        </div>
    </form>


    <hr>

    {{-- menampilkan semua coment --}}
    @forelse ($idea->coments->sortByDesc('created_at') as $coment)
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                src="{{ $coment->user->getImageUrl() }}"
                alt="{{ $coment->user->name }}">
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="">{{ $coment->user->name }}
                    </h6>
                    <small class="fs-6 fw-light text-muted">  {{ $coment->created_at->diffForHumans() }} </small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $coment->coment }}
                </p>
            </div>
        </div>
    @empty
        <p class="text-center mt-4">No Comments Found.</p>
    @endforelse
    {{-- akhir menampilkan semua coment  --}}

</div>
