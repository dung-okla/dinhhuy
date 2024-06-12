<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>SHOP LỪA ĐẢO</title>
    <style>
       .slideshow-container {
            position: relative;
            max-width: 100%;
            height: 450px;
            overflow: hidden;
            margin: auto;
        }

        .slide {
            display: none;
            width: 100%;
            height: 450px;
            position: absolute;
            top: 0;
            left: 0;
            transition: transform 1s ease;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            position: absolute;

        }

        .active {
            display: block;
            /* position: absolute; */
        }

        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .prev {
            left: 0;
            border-radius: 3px 3px 0 0;
        }

        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="header2">
            <a href="{{route('index')}}"><i class="fa-solid fa-house"></i>Trang chủ</a>
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
                <div class="container mt-5">
                    <div class="login">
                        <div class="cart-icon">
                            <a href="{{ route('cart.index') }}">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                            <span class="cart-quantity">{{$cart->getTotalquantity()}}</span>
                        </div>
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
                </div>
                <li><a>SẢN PHẨM</a>
                    <ul class="submenu">
                        @foreach ($categories as $value)
                            <li><a href="{{route('fe.category', $value->id)}}">{{ $value->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="#">PHÒNG</a>
                    <ul class="submenu">
                        <li><a href="#">Phòng khách</a></li>
                        <li><a href="#">Phòng ngủ</a></li>
                        {{-- <li><a href="#">Phòng bếp</a></li>
                        <li><a href="#">Phòng tắm</a></li>
                        <li><a href="#">Phòng làm việc</a></li> --}}
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
                <marquee behavior="" direction="left"><a href="" style=" font-weight:bold;font-size: 15px">LỪA ĐẢO SHOP </a></marquee>
            </div>
        </div>
    </div><br><br>
    <div class="big-content">
            <div class="slideshow-container">
                <div class="slide active">
                    <img  src="{{ asset('image/banner.jpg') }}" alt="Image 1">
                </div>
            </div>
        <div class="products">
            <div class="product-row">
                @foreach ($products as $item)
                    <div class="product">
                        <a href="{{ route('detail',$item->slug) }}"><img
                                src="{{ asset('storage/images') }}/{{ $item->image }}"width="400px"
                                alt="Product 3"></a><br><br>
                        <a style=" font-weight:bold;font-size: 20px">{{ $item->name }}</a>
                        <p style="text-decoration: line-through;">Giá gốc: {{ $item->price }}VNĐ</p>
                        <p style="font-weight: bold; color:deeppink">Khuyến mãi: {{ $item->sale_price }}VNĐ</p><br>
                        {{-- <div class="add"><button><i class="fa-solid fa-cart-plus"></i>Chi tiết sản phẩm</button>
                        </div> --}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
