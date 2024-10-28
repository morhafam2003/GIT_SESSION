<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>لوحة تحكم المشرف</h1>
    <nav>
        <ul>
            <li><a href="{{ route('admin.products.index') }}">إدارة المنتجات</a></li>
            <li><a href="{{ route('admin.categories.index') }}">إدارة الفئات</a></li>
            <li><a href="{{ route('admin.orders.index') }}">عرض الطلبات</a></li>
        </ul>
    </nav>
</body>
</html>
