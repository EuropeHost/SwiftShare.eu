<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function create(): View
    {
        return view("auth.login");
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "email" => ["required", "string", "email"],
            "password" => ["required", "string"],
        ]);

        if (
            !Auth::attempt(
                $request->only("email", "password"),
                $request->boolean("remember"),
            )
        ) {
            throw ValidationException::withMessages([
                "email" => __("auth.failed"),
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended("/dashboard");
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }
}
