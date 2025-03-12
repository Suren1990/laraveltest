<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginStoreController extends Controller
{
    public function __invoke()
    {
        // Валидация входных данных
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Попытка аутентификации
        if (!Auth::attempt([
            'email' => $attributes['email'],
            'password' => $attributes['password'],
        ])) {
            // Если аутентификация не удалась, возвращаем пользователя на страницу регистрации
            return redirect('/registration');
        }

        // Перегенерация сессии после успешной аутентификации
        request()->session()->regenerate();

        // Перенаправление на страницу dashboard после успешной аутентификации
        return redirect('/dashboard');
    }
}
