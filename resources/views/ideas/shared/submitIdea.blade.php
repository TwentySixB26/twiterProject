@auth
<h4> Share yours ideas </h4>
<div class="row">
    <form action="/ideas" method="post">
        @csrf
        <div class="mb-3">
            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
            @error('idea')
                <span class="fs-6 text-danger"> {{ $message }} </span>
            @enderror
        </div>
        <div class="">
            <button class="btn btn-dark" type="submit"> Share </button>
        </div>
    </form>
</div>
@endauth



@guest()
    <h4> Anda belum melakukan Login</h4>
@endguest
