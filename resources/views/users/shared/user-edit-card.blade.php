<div class="card">
    <div class="px-3 pt-4 pb-2">

        <form enctype="multipart/form-data" method="post" action="/users/{{ $user->id }}">
            @csrf
            @method('put')
            {{-- img profile, nama , view --}}
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}" alt="Mario Avatar">
                    <div>
                        <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                        @error('name')
                            <span class="text-danger fs-6">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    @auth()
                        @if (Auth::id() === $user->id)
                            <a href="/users/{{ $user->id }}"> view </a>
                        @endif
                    @endauth
                </div>
            </div>
            {{-- akhir img, nama , view --}}


            {{--input untuk menangani image --}}
            <div class="mt-4">
                <label for="">Profile Picture</label>
                <input type="file" class="form-control" name="image">
                @error('image')
                    <span class="fs-6 text-danger"> {{ $message }} </span>
                @enderror
            </div>
            {{-- akhir input untuk menangani image --}}


            {{-- bio,btn save,followers,coment --}}
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                <div class="mb-3">
                    <textarea class="form-control" id="bio" rows="3" name="bio"> {{ $user->bio }} </textarea>
                    @error('bio')
                        <span class="fs-6 text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <button class="btn btn-dark btn-sm">Save</button>
                @include('users.shared.user-stats')

            </div>
            {{-- akhir bio,btn save,followers,coment --}}
        </form>
    </div>
</div>






