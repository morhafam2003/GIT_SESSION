<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;  // تأكد من استيراد نموذج المستخدم
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    use HasApiTokens; // استخدام واجهة التعامل الرمزي

    // دالة تسجيل الدخول
    public function login(Request $request)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        // التحقق من صحة بيانات الاعتماد
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // الحصول على المستخدم
            $token = $user->createToken('API Token')->plainTextToken; // إنشاء الرمز
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // دالة تسجيل الخروج
    public function logout(Request $request)
    {
        // التحقق مما إذا كان المستخدم مسجلاً الدخول
        $request->user()->tokens()->delete(); // حذف جميع الرموز
        return response()->json(['message' => 'Logged out'], 200);
    }
}
