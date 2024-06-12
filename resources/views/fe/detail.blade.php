<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/index.css') }}"> --}}
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">

</head>
<body>  
    {{-- <div class="header">
        <div class="header2">
            <a href=""><i class="fa-solid fa-house"></i>Trang chủ</a>
            <a href=""><i class="fa-solid fa-circle-info"></i> Giới thiệu</a>
            <a href=""><i class="fa-solid fa-truck-fast"></i> Giao hàng xuyên Lục Địa</a>
            <a href="/product details"><i class="fa-solid fa-phone"></i> HOTLINE: 0678 910J QKA </a>
            <a href=""><i class="fa-solid fa-envelope"></i>Email: LuaDaoShop@gmail.com</a>
            <a href=""></i></a>
        </div>
    </div>
    <hr>
    <div class="logo">
        <div class="menu">
            <ul>
                <div class="search-box">
                    <input type="search" placeholder="     Search...">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="login">
                    <a href="/cart"><i class="fa-solid fa-cart-shopping"></i></a>
                    @if (Auth::check())
                        <div class="user-menu">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>{{ Auth::user()->name }}
                            <div class="dropdown-content">
                                <a href="/profile">Cài đặt</a>
                                <a href="{{ asset('logout') }}">Đăng xuất</a>
                            </div>
                        </div>
                    @else
                        <a href="{{ asset('login') }}"><i class="fa-solid fa-right-to-bracket"></i></a>
                    @endif
                </div>
                <li><a>SẢN PHẨM</a>
                    <ul class="submenu">
                        @foreach ($categories as $value)
                            <li><a href="#">{{ $value->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="#">PHÒNG</a>
                    <ul class="submenu">
                        <li><a href="#">Phòng khách</a></li>
                        <li><a href="#">Phòng ngủ</a></li>
                        <li><a href="#">Phòng bếp</a></li>
                        <li><a href="#">Phòng tắm</a></li>
                        <li><a href="#">Phòng làm việc</a></li>
                    </ul>
                </li>
                <li><a href="#">COMBO</a></li>
            </ul>
        </div>
        <div class="pyramid-loader">
            <div class="wrapper">
                <span class="side side1"></span>
                <span class="side side2"></span>
                <span class="side side3"></span>
                <span class="side side4"></span>
                <span class="shadow"></span>
            </div>
            <div class="name">
                <marquee behavior="" direction="left"><a href="" style=" font-weight:bold;font-size: 15px">LỪA
                        ĐẢO SHOP </a></marquee>
            </div>
        </div>
    </div><br><br> --}}
    <a href="{{route('index')}}"><i class="fa-solid fa-house"></i>Trang chủ</a>

    <div class="container mt-5">
        <div class="row">
            <!-- Left Column: Product Images -->
            <div class="col-md-6">
                <div class="product-images">
                    <img src="{{ asset('storage/images') }}/{{ $product->image }}" class="main-image" id="mainImage" alt="Main Product Image">
                    <div class="navigation-buttons">
                        <a href="#" class="prev" onclick="changeSlide(-1)">&#10094;</a>
                        <a href="#" class="next" onclick="changeSlide(1)">&#10095;</a>
                    </div>
                    <div class="thumbnail-images">
                        <img src="{{ asset('storage/images') }}/{{ $product->image }}" class="img-thumbnail active" alt="Product Thumbnail" onclick="changeImage(this)">
                        @foreach($product->images as $item)
                            <img src="{{ asset('storage/images') }}/{{ $item->image }}" class="img-thumbnail" alt="Product Thumbnail" onclick="changeImage(this)">
                        @endforeach
                    </div>
                </div>
            </div>
    
            <!-- Right Column: Product Details -->
            <div class="col-md-6">
                <form action="{{route('cart.add')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="d-flex align-items-center mb-3" style="color: deeppink;">
                        <p style="margin-right: 20px">1,5k Đánh Giá</p>
                        <p>2,3k Lượt Bán</p>
                    </div>
                    <h2>{{ $product->name }}</h2><br>
                    <p style="font-size:20px;text-decoration: line-through;">Giá gốc: {{ $product->price }}VNĐ</p>
                    <p style="font-size:25px;font-weight: bold; color: deeppink;">Giá khuyến mãi: {{ $product->sale_price }} VNĐ</p><br>
                    <p style="color: deeppink"><i class="fa-solid fa-truck-fast"></i>Miễn phí vận chuyển 0đ</p>
                    <div class="d-flex align-items-center mb-3">
                        <input name="quantity" type="number" class="form-control quantity-selector mr-2" value="1" min="1">
                        <button type="submit" class="mr-2 btn btn-primary"><i class="fa-solid fa-cart-plus"></i>Thêm Vào Giỏ Hàng</button>
                        <button  onclick="return confirm('Bạn đã bị lừa 1 jack')" class="btn btn-danger">Mua Ngay</button>
                    </div>
                </form>
            </div>  
        </div><br><br>
        <p style="font-size:25px;font-weight: bold;">Mô tả chi tiết sản phẩm:</p>
        <p>{{ $product->description }}</p><br>
    </div>
    <div class="container mt-5">
        <h1>Sản phẩm liên quan:</h1><br>
        <div class="row">
            @foreach ($related as $item)
            <div class="col-md-4 d-flex flex-column align-items-center mb-4">
                <a href="{{ route('detail',$item->slug) }}">
                    <img src="{{ asset('storage/images') }}/{{ $item->image }}" class="img-fluid" alt="Product Image">
                </a>
                <br>
                <a href="{{ route('detail',$item->slug) }}" class="text-center font-weight-bold" style="font-size: 20px">{{ $item->name }}</a>
                <p class="text-center" style="text-decoration: line-through;">Giá gốc: {{ $item->price }} VNĐ</p>
                <p class="text-center font-weight-bold" style="color: deeppink">Khuyến mãi: {{ $item->sale_price }} VNĐ</p>
                {{-- <div class="add">
                    <button class="btn btn-outline-primary"><i class="fa-solid fa-cart-plus"></i>Thêm vào giỏ hàng</button>
                </div> --}}
            </div>
            @endforeach
        </div>
    </div>
    
    
    <script>
        let slideIndex = 0;
        const thumbnails = document.querySelectorAll('.thumbnail-images img');
        const mainImage = document.getElementById('mainImage');

        function changeImage(element) {
            mainImage.src = element.src;
            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            element.classList.add('active');
        }

        function changeSlide(n) {
            slideIndex += n;
            if (slideIndex < 0) {
                slideIndex = thumbnails.length - 1;
            } else if (slideIndex >= thumbnails.length) {
                slideIndex = 0;
            }
            mainImage.src = thumbnails[slideIndex].src;
            thumbnails.forEach(thumb => thumb.classList.remove('active'));
            thumbnails[slideIndex].classList.add('active');
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
