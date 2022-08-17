@extends('layouts.frontend')
{{--@section('shop-styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection--}}
@section('title')
    Funko King | Funko Pop
@endsection
@section('content')
    <section id="breadcrumb-nav" class="row">
        <div class="col-lg-8 offset-lg-2">
            <!--            <nav aria-label="breadcrumb">-->
            <ol class="breadcrumb m-0 mt-4 px-0">
                <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="fas fa-home mr-2"></i>Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('shop')}}">Shop!</a></li>
                <li class="breadcrumb-item active" aria-current="page">Funko Pop</li>
            </ol>
            <!--            </nav>-->
        </div>
    </section>
    <section class="row mb-5">
        <div class="col-xs-12 col-sm-12 col-lg-8 d-lg-flex offset-lg-2">
            <div id="sidebar" class="col-lg-3 px-0 mt-lg-5">
                <header>
                    <h2 class="mt-4">Funko Pop Categories</h2>
                </header>
                <hr>
                <div class="list-group">
                    <a href="{{route('shop')}}" class="list-group-item list-group-item-action text-center">Alle Producten</a>
                    @foreach($subcategories as $subcategory)
                        <a href="{{ route('productsPerSubCategory', $subcategory->id) }}"
                           class="list-group-item list-group-item-action p-2 text-center">{{ $subcategory->name }}</a>
                    @endforeach
                </div>
                <header>
                    <h2 class="mt-5">Filters</h2>
                </header>
                <hr>
                <div class="accordion mt-4" id="accordionExample1">
                    <div class="card">
                        <div class="card-header py-0" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    Prijs:
                                </button>
                            </h2>
                        </div>

                        <div id="collapseFour" class="collapse show" aria-labelledby="headingFour"
                             data-parent="#accordionExample">
                            <div class="card-body">
                               {{-- <p>
                                    <!--                                    <label for="amount">Price range:</label>-->
                                    <input type="text" id="amount" readonly
                                           style="border:0; color:black; font-weight:bold;">
                                </p>
                                <div id="slider-range"></div>--}}
                                <div id="skipstep"></div>
                                <div class="d-flex justify-content-between mt-2">
                                    <span id="skip-value-lower">€</span>
                                    <span id="skip-value-upper">€</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <header>
                    <h2 class="mt-5">Toppers</h2>
                </header>
                <hr>
                <div class="d-sm-flex d-md-flex flex-lg-column">
                    @foreach($toppers as $product)
                        <a href="{{ route('product.show', $product->slug) }}">
                    <div class="card col-12 col-sm-4 col-md-4 col-lg-12 mt-4">
                        <article class="d-flex justify-content-center align-items-center">
                            <div><img height="90" src="{{ asset('images/products/' . $product->photo->file) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="card-text">
                                <p>{{ $product->name }}</p>
                                <p class="m-0">€ {{ $product->price }}</p>
                            </div>
                        </article>
                    </div>
                        </a>
                    @endforeach
                </div>
                <hr class="mt-4">
                <div class="d-flex justify-content-center">
                    <img class="img-fluid" src="{{asset('images/banner.jpg')}}" alt="image">
                </div>
            </div>
            <div id="products-filters" class="col-lg-9 mt-4 mt-lg-5">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8 d-flex justify-content-center justify-content-md-start">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle knop" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Artikelen:
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">12</a>
                                <a class="dropdown-item" href="#">18</a>
                                <a class="dropdown-item" href="#">24</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 d-flex justify-content-center justify-content-md-end px-0">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle knop" type="button" id="dropdownMenuButton1" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Rangschikken:
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <a class="dropdown-item" href="{{ route('pop', ['category' => request()->category, 'sort' => 'name']) }}">Naam</a>
                                {{--<a class="dropdown-item" href="#">Prijs</a>--}}
                                <a class="dropdown-item" href="{{ route('pop', ['category' => request()->category, 'sort' => 'low_high']) }}">Prijs: Laag - Hoog</a>
                                <a class="dropdown-item" href="{{ route('pop', ['category' => request()->category, 'sort' => 'high_low']) }}">Prijs: Hoog - Laag</a>
                                {{--<a class="dropdown-item" href="#">Populariteit</a>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div id="carousel-slide" class="row">
                    @if(count($products) > 0)
                        @foreach($products as $product)
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-6 col-xl-4 mt-4">
                                <article>
                                    <div class="card rounded-0">
                                        <small class="text-center text-muted">{{ $product->category->name }}</small>
                                            <img class="img-fluid image card-img-top"
                                                 src="{{asset('images/products/' . $product->photo->file)}}"
                                                 alt="article">
                                            <div class="card-body">
                                                <h5 class="card-title text-center">{{$product->name}}</h5>
                                                <p class="card-text text-center">€ {{$product->price}}</p>
                                            </div>
                                        <div class="d-flex">
                                            <div class="col-xl-6 d-md-flex justify-content-center p-0">
                                                <a href="{{--{{route('addToCart', $product->id)}}--}}" class="btn btn-primary rounded-0 w-100">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="col-xl-6 d-md-flex justify-content-center p-0">
                                                <a href="{{route('product.show', $product->slug)}}" class="btn btn-primary rounded-0 w-100">
                                                    <p class="m-0">Meer info</p>
                                                </a>
                                            </div>
                                        </div>
                                        </div>
                                </article>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 mt-lg-5">
                            <p>Geen producten momenteel in deze category!</p>
                        </div>
                    @endif
                </div>
                <hr>
            </div>
        </div>
    </section>
@endsection
{{--
@section('shop-scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection
--}}

