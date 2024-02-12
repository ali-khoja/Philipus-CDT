@extends('app')
@section('main')
<br>
<br>
<br>
<br>

<div class="container">
    <div class="shop-default shop-cards shop-tech">
        @foreach ($galleryg as $group)
            <div class="row">
                @foreach ( $group as $g)
                    <div class="col-md-3">
                        <div class="block product no-border z-depth-2-top z-depth-2--hover">
                            <div class="block-image">
                                <a href="#">
                                    <img src="{{ asset('images/gallery/' . $g->picture) }}" width=100%;  class="img-center">
                                </a>
                            </div>
                            <div class="block-body text-center">
                                <h3 class="heading heading-5 strong-600 text-capitalize">
                                    <a href="#">
                                        {{$g->header}}
                                    </a>
                                </h3>
                                <p class="product-description">
                                    {{$g->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
<br>
<br>
@endsection
