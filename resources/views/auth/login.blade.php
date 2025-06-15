@extends('layouts.auth') @section('auth_content')
<h2 class="mb-6 text-center text-2xl font-bold text-gray-900">
  {{ __('auth.login_title') }}
</h2>

<form method="POST" action="{{ route('login') }}" class="space-y-6">
  @csrf
  <div>
    <label for="email" class="block text-sm font-medium text-gray-700">
      {{ __('auth.email') }}
    </label>
    <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}" class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"/>
    @error('email')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
  </div>

  <div>
    <label for="password" class="block text-sm font-medium text-gray-700">
      {{ __('auth.password') }}
    </label>
    <input id="password" name="password" type="password" required class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"/>
  </div>

  <div class="flex items-center justify-between">
    <div class="flex items-center">
      <input id="remember" name="remember" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"/>
      <label for="remember" class="ml-2 block text-sm text-gray-900">
        {{ __('auth.remember_me') }}
      </label>
    </div>
    <div class="text-sm">
      <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
        {{ __('auth.forgot_password') }}
      </a>
    </div>
  </div>

  <div>
    <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
      {{ __('auth.sign_in') }}
    </button>
  </div>
</form>

<div class="relative my-6">
  <div class="absolute inset-0 flex items-center">
    <div class="w-full border-t border-gray-300"></div>
  </div>
  <div class="relative flex justify-center text-sm">
    <span class="bg-white px-2 text-gray-500">{{ __('auth.or_continue_with') }}</span>
  </div>
</div>

<div>
  <a href="{{ route('auth.discord.redirect') }}" class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">
    <i class="bi bi-discord -ml-1 mr-2 h-5 w-5"></i>
    <span>{{ __('auth.login_with_discord') }}</span>
  </a>
</div>

<p class="mt-6 text-center text-sm text-gray-600">
  {{ __('auth.no_account') }}
  <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
    {{ __('auth.register_now') }}
  </a>
</p>
@endsection
