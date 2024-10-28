<?php

namespace App\Http\Controllers;

use App\Models\Order; // تأكد من إنشاء نموذج Order
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // عرض جميع الطلبات (للمشرفين فقط)
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    // إنشاء طلب جديد (للمستخدمين)
    public function store(Request $request)
    {
        $order = Order::create([
            'user_id' => $request->user()->id, // يربط الطلب بالمستخدم المسجل
            'product_id' => $request->product_id, // تأكد من إرسال معرف المنتج
        ]);
        return response()->json($order, 201);
    }
}
