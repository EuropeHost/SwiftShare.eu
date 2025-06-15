@extends('layouts.app') @section('content')
<div class="flex min-h-screen flex-col items-center justify-center bg-gray-50">
  <div class="mb-6">
    <a href="{{ route('home') }}" class="text-3xl font-bold text-gray-900">
      {{ config("app.name", "SwiftShare") }}
    </a>
  </div>
  <div class="w-full max-w-md rounded-lg bg-white p-8 shadow-md">
    @yield('auth_content')
  </div>
</div>
@endsection
