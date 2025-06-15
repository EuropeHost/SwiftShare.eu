<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DiscordController extends Controller
{
    public function redirect(): RedirectResponse
    {
        $queryParams = http_build_query([
            "client_id" => config("services.discord.client_id"),
            "redirect_uri" => config("services.discord.redirect"),
            "response_type" => "code",
            "scope" => "identify email",
            "prompt" => "consent",
        ]);

        $url = "https://discord.com/api/oauth2/authorize?" . $queryParams;

        return redirect($url);
    }

    public function callback(Request $request): RedirectResponse
    {
        if ($request->has("error")) {
            return redirect()
                ->route("login")
                ->withErrors(["email" => __("auth.discord_failed")]);
        }

        $tokenResponse = Http::asForm()->post(
            "https://discord.com/api/oauth2/token",
            [
                "client_id" => config("services.discord.client_id"),
                "client_secret" => config("services.discord.client_secret"),
                "grant_type" => "authorization_code",
                "code" => $request->input("code"),
                "redirect_uri" => config("services.discord.redirect"),
            ],
        );

        if ($tokenResponse->failed()) {
            return redirect()
                ->route("login")
                ->withErrors(["email" => __("auth.discord_failed")]);
        }

        $accessToken = $tokenResponse->json("access_token");

        $userResponse = Http::withToken($accessToken)->get(
            "https://discord.com/api/users/@me",
        );

        if ($userResponse->failed()) {
            return redirect()
                ->route("login")
                ->withErrors(["email" => __("auth.discord_failed")]);
        }

        $discordUser = $userResponse->json();

        $user = User::updateOrCreate(
            [
                "discord_id" => $discordUser["id"],
            ],
            [
                "email" => $discordUser["email"],
                "email_verified_at" => now(), // Email is verified by Discord
                "password" => null,
            ],
        );

        Auth::login($user, true);

        return redirect()->intended("/dashboard");
    }
}
