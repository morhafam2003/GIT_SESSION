<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض المنتجات</title>
</head>
<body>
    <h1>قائمة المنتجات</h1>
    
    <ul>
        @foreach($products as $product)
            <li>
                <h2>{{ $product->name }}</h2>
                <p>السعر: {{ $product->price }} ريال</p>
                <p>{{ $product->description }}</p>

                <!-- نموذج لشراء المنتج -->
                <form action="{{ route('customer.orders.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit">شراء</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
