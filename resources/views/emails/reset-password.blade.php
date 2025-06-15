@extends('layouts.email') @section('content')
<h1 class="text-xl font-bold text-gray-800 mb-4">
  {{ __('Reset Your Password') }}
</h1>
<p class="mb-4">
  {{ __('You are receiving this email because we received a password reset request for your account.') }}
</p>
<div class="text-center my-6">
  <a href="{{ $url }}" class="inline-block rounded-md bg-indigo-600 px-6 py-3 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
    {{ __('Reset Password') }}
  </a>
</div>
<p class="mb-4">
  {{ __('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]) }}
</p>
<p class="mb-4">
  {{ __("If you did not request a password reset, no further action is required.") }}
</p>
@endsection
