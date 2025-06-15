@extends('layouts.auth') @section('auth_content')
<div class="mb-4 text-sm text-gray-600">
  {{ __('auth.forgot_password_text') }}
</div>

@if (session('status'))
<div class="mb-4 font-medium text-sm text-green-600">
  {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('password.email') }}">
  @csrf
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
      value="{{ old('email') }}"
      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
    />
    @error('email')
    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
  </div>

  <div class="mt-4 flex items-center justify-end">
    <button
      type="submit"
      class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-indigo-700"
    >
      {{ __('auth.send_password_reset_link') }}
    </button>
  </div>
</form>
@endsection
