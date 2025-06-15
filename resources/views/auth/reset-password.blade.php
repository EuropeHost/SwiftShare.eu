@extends('layouts.auth') @section('auth_content')
<h2 class="mb-6 text-center text-2xl font-bold text-gray-900">
  {{ __('Reset Password') }}
</h2>

<form method="POST" action="{{ route('password.store') }}" class="space-y-6">
  @csrf

  <!-- Password Reset Token -->
  <input type="hidden" name="token" value="{{ $request->route('token') }}" />

  <!-- Email Address -->
  <div>
    <label for="email" class="block text-sm font-medium text-gray-700">
      {{ __('auth.email') }}
    </label>
    <input
      id="email"
      name="email"
      type="email"
      required
      autofocus
      value="{{ old('email', $request->email) }}"
      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
    />
    @error('email')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
  </div>

  <!-- Password -->
  <div>
    <label for="password" class="block text-sm font-medium text-gray-700">
      {{ __('auth.password') }}
    </label>
    <input
      id="password"
      name="password"
      type="password"
      required
      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
    />
    @error('password')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
  </div>

  <!-- Confirm Password -->
  <div>
    <label
      for="password_confirmation"
      class="block text-sm font-medium text-gray-700"
    >
      {{ __('auth.confirm_password') }}
    </label>
    <input
      id="password_confirmation"
      name="password_confirmation"
      type="password"
      required
      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
    />
  </div>

  <div class="flex items-center justify-end">
    <button
      type="submit"
      class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700"
    >
      {{ __('Reset Password') }}
    </button>
  </div>
</form>
@endsection
