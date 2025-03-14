<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\NewUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginDestroyController extends Controller
{
    public function __invoke(Request $request){
        Auth::logout();  // Завершаем сессию пользователя
        $request->session()->invalidate();  // Инвалидируем сессию
        $request->session()->regenerateToken();  // Генерация нового CSRF токена

        return redirect('/'); 
    }
}
