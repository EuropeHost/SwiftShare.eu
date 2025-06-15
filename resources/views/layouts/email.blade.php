<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      body { font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", sans-serif; }
    </style>
  </head>
  <body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
      <div class="bg-white shadow-sm rounded-lg p-8">
        <div class="text-center mb-8">
          <a href="{{ config('app.url') }}" class="text-2xl font-bold text-gray-900">
            {{ config("app.name", "SwiftShare") }}
          </a>
        </div>
        <div class="text-gray-700">
            @yield('content')
        </div>
        <div class="text-center mt-8 text-sm text-gray-500">
          &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
      </div>
    </div>
  </body>
</html>
