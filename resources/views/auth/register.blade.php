@extends('layouts.auth') @section('auth_content')
<h2 class="mb-6 text-center text-2xl font-bold text-gray-900">
  {{ __('auth.register_title') }}
</h2>

<form method="POST" action="{{ route('register') }}" class="space-y-6">
  @csrf
  <div>
    <label for="email" class="block text-sm font-medium text-gray-700">
      {{ __('auth.email') }}
    </label>
    <input id="email" name="email" type="email" required value="{{ old('email') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
    @error('email')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
  </div>

  <div>
    <label for="password" class="block text-sm font-medium text-gray-700">
      {{ __('auth.password') }}
    </label>
    <input id="password" name="password" type="password" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
    @error('password')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
  </div>

  <div>
    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
      {{ __('auth.confirm_password') }}
    </label>
    <input id="password_confirmation" name="password_confirmation" type="password" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"/>
  </div>

  <div>
    <button type="submit" class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
      {{ __('auth.register') }}
    </button>
  </div>
</form>

<p class="mt-6 text-center text-sm text-gray-600">
  {{ __('auth.already_have_account') }}
  <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
    {{ __('auth.sign_in') }}
  </a>
</p>
@endsection
