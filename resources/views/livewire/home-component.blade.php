
    <div class="container">

        <!--MAIN SLIDE-->
        @if($sliders->isNotEmpty())
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                data-dots="false">
                @foreach($sliders as $key => $slider)
                <div class="item-slide">
                    <img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" alt="{{$slider->title}}" class="img" width="100%" style="height:80vh;">
                    <div class="slide-info slide-1">
                        <h2 class="f-title">{{$slider->title}}</h2>
                        <span class="subtitle">{{$slider->caption}}</span>
                        @if($slider->price)<p class="sale-info">Only price: <span class="price">${{$slider->price}}</span></p>@endif
                        @if($slider->link)<a href="{{$slider->link}}" class="btn-link" target="_blank">Shop Now</a>@endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{asset('assets/images/home-1-banner-1.jpg')}}" alt="" width="580" height="190">
                    </figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{asset('assets/images/home-1-banner-2.jpg')}}" alt="" width="580" height="190">
                    </figure>
                </a>
            </div>
        </div>

        @if($sale_products->isNotEmpty() && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
        <!--On Sale-->
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">On Sale</h3>
            <div class="wrap-countdown mercado-countdown" data-expire="{{Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d h:i:s')}}"></div>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                data-loop="false" data-nav="true" data-dots="false"
                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                @foreach ($sale_products as $product)
                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{route('product.detail',$product->slug)}}" title="{{$product->name}}">
                            <figure><img src="{{asset('assets/images/products')}}/{{$product->featured_image}}" width="800"
                                    height="800" alt="{{$product->name}}"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item sale-label">sale</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="{{route('product.detail',$product->slug)}}" class="function-link">quick view</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="{{route('product.detail',$product->slug)}}" class="product-name"><span>R{{$product->name}}</span></a>
                        <div class="wrap-price"><span class="product-price " style="text-decoration:line-through">${{$product->regular_price}}</span><span class="product-price" style="padding-left: 5px; color:red;">${{$product->sale_price}}</span></div>
                    </div>
                </div>
                @endforeach


           </div>
        </div>
        @endif
        <!--Latest Products-->
        @if($latest_products->isNotEmpty())
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Latest Products</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{asset('assets/images/digital-electronic-banner.jpg')}}" width="1170" height="240"
                            alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                @foreach ($latest_products as $product)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('product.detail',$product->slug)}}" title="{{$product->name}}">
                                            <figure><img src="{{asset('assets/images/products')}}/{{$product->featured_image}}" width="800"
                                                 height="800"   alt="{{$product->name}}">
                                            </figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('product.detail',$product->slug)}}" class="function-link">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('product.detail',$product->slug)}}" class="product-name"><span>{{$product->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">${{$product->regular_price}}</span></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Product Categories</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{asset('assets/images/fashion-accesories-banner.jpg')}}" width="1170" height="240"
                            alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        @foreach ($categories as $key => $category)
                        <a href="#category_{{$category->id}}" class="tab-control-item {{$key == 0 ? 'active' : ''}}">{{$category->name}}</a>
                        @endforeach
                    </div>
                    <div class="tab-contents">
                        @foreach ($categories as $key=>$category)

                        <div class="tab-content-item  {{$key == 0 ? 'active' : ''}}" id="category_{{$category->id}}">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                    @php
                                        $products = DB::table('products')->where('category_id',$category->id)->take($no_of_products)->get();
                                    @endphp
                                    @foreach ($products as $product)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{route('product.detail',$product->slug)}}" title="{{$product->name}}">
                                                <figure><img src="{{asset('assets/images/products')}}/{{$product->featured_image}}" width="800"
                                                        height="800" alt="{{$product->name}}">
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="{{route('product.detail',$product->slug)}}" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{route('product.detail',$product->slug)}}" class="product-name"><span>{{$product->name}}</span></a>
                                            <div class="wrap-price"><span class="product-price">${{$product->regular_price}}</span></div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


