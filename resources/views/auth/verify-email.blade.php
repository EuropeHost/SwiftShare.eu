@extends('layouts.auth') @section('auth_content')
<div class="mb-4 text-sm text-gray-600">
  {{ __('auth.verify_email_text') }}
</div>

@if (session('status') == 'verification-link-sent')
<div class="mb-4 font-medium text-sm text-green-600">
  {{ __('auth.verify_email_sent') }}
</div>
@endif

<div class="mt-4 flex items-center justify-between">
  <form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button
      type="submit"
      class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150"
    >
      {{ __('auth.resend_verification_email') }}
    </button>
  </form>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button
      type="submit"
      class="text-sm text-gray-600 underline hover:text-gray-900"
    >
      {{ __('auth.logout') }}
    </button>
  </form>
</div>
@endsection
