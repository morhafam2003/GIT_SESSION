<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة المنتجات</title>
</head>
<body>
    <h1>إدارة المنتجات</h1>

    <!-- نموذج لإضافة منتج جديد -->
    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <label for="name">اسم المنتج:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="price">السعر:</label>
        <input type="number" id="price" name="price" required>
        
        <label for="description">الوصف:</label>
        <textarea id="description" name="description"></textarea>
        
        <button type="submit">إضافة المنتج</button>
    </form>

    <hr>

    <!-- عرض قائمة المنتجات -->
    <h2>قائمة المنتجات</h2>
    <table>
        <thead>
            <tr>
                <th>اسم المنتج</th>
                <th>السعر</th>
                <th>الوصف</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <!-- زر التحديث -->
                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" value="{{ $product->name }}" required>
                            <input type="number" name="price" value="{{ $product->price }}" required>
                            <textarea name="description">{{ $product->description }}</textarea>
                            <button type="submit">تحديث</button>
                        </form>

                        <!-- زر الحذف -->
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
