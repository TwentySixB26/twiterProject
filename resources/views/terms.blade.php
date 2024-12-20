@extends('layout/layout')

@section('title','terms')


@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared/leftSideBar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, sed deserunt, veniam velit suscipit molestias recusandae non facilis nesciunt fugiat illum minus iste dolorem commodi ratione vitae officia sequi iusto incidunt autem rerum impedit, quia soluta vel? Blanditiis molestiae optio impedit facere praesentium excepturi suscipit obcaecati mollitia nemo accusamus tempora, assumenda quas corporis harum. Tenetur, a accusamus. Similique, modi. Eius laborum iure veniam impedit laudantium, totam delectus quos optio iste inventore fuga deserunt in aliquam molestiae debitis vero ipsum aliquid ratione mollitia, doloremque ullam? Doloremque, aliquam. Et aliquid, magni non laborum libero facilis vel explicabo enim? Voluptas facere voluptatibus eligendi ab dolor neque, rerum ducimus deleniti non nesciunt officiis nostrum deserunt quam ea molestias asperiores quod et cum reiciendis. Dolorem.
            </div>
        </div>
        <div class="col-3">
            {{-- agar terkait dengan serach bar --}}
            @include('shared/searchBar')
            {{-- agar terkait dengan follow box --}}
            @include('shared/followBox')
        </div>
    </div>
@endsection
