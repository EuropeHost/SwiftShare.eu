@extends('layouts.email') @section('content')
<h1 class="text-xl font-bold text-gray-800 mb-4">
  {{ __('Verify Your Email Address') }}
</h1>
<p class="mb-4">
  {{ __('Please click the button below to verify your email address.') }}
</p>
<div class="text-center my-6">
  <a href="{{ $url }}" class="inline-block rounded-md bg-indigo-600 px-6 py-3 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
    {{ __('Verify Email Address') }}
  </a>
</div>
<p class="mb-4">
  {{ __("If you did not create an account, no further action is required.") }}
</p>
<p class="text-sm text-gray-500">
  {{ __("If you're having trouble clicking the button, copy and paste the URL below into your web browser:") }}
  <br />
  <a href="{{ $url }}" class="text-indigo-600 break-all">{{ $url }}</a>
</p>
@endsection
