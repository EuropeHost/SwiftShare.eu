<?php

use App\Http\Controllers\Auth\DiscordController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;

 Route::get("/", function () {
        return "Welcome to SwiftShare!"; // Placeholder
    })->name("home");

Route::middleware("guest")->group(function () {
    // Discord Auth
    Route::get("/auth/discord/redirect", [DiscordController::class, "redirect"])->name("auth.discord.redirect");
    Route::get("/auth/discord/callback", [DiscordController::class, "callback"])->name("auth.discord.callback");

    // Registration
    Route::get("/auth/register", [RegisterController::class, "create"])->name("register");
    Route::post("/auth/register", [RegisterController::class, "store"]);

    // Login
    Route::get("/auth/login", [LoginController::class, "create"])->name("login");
    Route::post("/auth/login", [LoginController::class, "store"]);
	
    // Forgot Password
    Route::get("forgot-password", [PasswordResetController::class, "create"])->name("password.request");
    Route::post("forgot-password", [PasswordResetController::class, "store"])->name("password.email");

    // Reset Password
    Route::get("reset-password/{token}", [NewPasswordController::class, "create"])->name("password.reset");
    Route::post("reset-password", [NewPasswordController::class, "store"])->name("password.store");
});

Route::middleware("auth")->group(function () {
    // Email Verification
    Route::get("/auth/email/verify", [EmailVerificationController::class, "notice"])->name("verification.notice");
    Route::get("/auth/email/verify/{id}/{hash}", [EmailVerificationController::class, "verify"])->middleware(["signed"])->name("verification.verify");
    Route::post("/auth/email/verification-notification", [EmailVerificationController::class, "send"])->middleware(["throttle:6,1"])->name("verification.send");

    // Logout
    Route::post("/auth/logout", [LoginController::class, "destroy"])->name("logout");

    // Authenticated Routes
    Route::get("/dashboard", function () {
        return "Welcome to the dashboard!"; // Placeholder
    })->middleware("verified")->name("dashboard");
});
