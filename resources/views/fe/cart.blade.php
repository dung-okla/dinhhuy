<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/cart.css') }}"> --}}

    <style>
        .cart-header {
            text-align: center;
            margin: 2rem 0;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding: 1rem;
            border-bottom: 1px solid #ddd;
        }

        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .cart-item-details {
            flex-grow: 1;
            margin-left: 1rem;
        }

        .cart-item-actions {
            display: flex;
            align-items: center;
        }

        .cart-total {
            text-align: right;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .cart-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .product-name {
            font-weight: bold;
            font-size: 1.25rem;
            display: block;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .quantity input {
            width: 70px;
            /* Adjust this value as needed */
            margin-right: 1rem;
            /* Space between input and button */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="cart-header"> <i class="fa-solid fa-cart-shopping"></i>Giỏ hàng</h1>

        @foreach ($cart->list() as $key => $value)
            <div class="cart-item">
                <img src="{{ asset('storage/images') }}/{{ $value['image'] }}" alt="Product Image">
                <div class="cart-item-details">
                    <span class="product-name"> {{ $value['name'] }} </span>
                    <p class="product-price">Giá: {{ number_format($value['price']) }} VNĐ</p>
                    <div class="quantity">
                        <label for="quantity-{{ $key }}">Số lượng:</label>
                        <input type="number" id="quantity-{{ $key }}" class="form-control"
                            value="{{ $value['quantity'] }}" min="1" max="10">
                    </div>
                    <p class="product-price">Thành tiền: {{ number_format($value['price'] * $value['quantity']) }} VNĐ
                    </p>
                    <div class="cart-item-actions">
                        <a onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này?')"
                            href="{{ route('cart.delete', ['id' => $value['productId']]) }}" class="btn btn-danger">
                            <i class="fa fa-trash"></i> Remove
                        </a>
                    </div> 
                </div>
            </div>
        @endforeach

        <!-- Cart Total -->
        <div class="cart-total">
            Tổng tiền phải thanh toán: {{ number_format($cart->getTotalPrice()) }} VNĐ
        </div>
        <div class="cart-actions">
            <a href="{{ route('index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Quay lại</a>
            <a onclick="return confirm('Bạn đã bị lừa 1 jack')" href="" class="btn btn-success">Đặt hàng <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
