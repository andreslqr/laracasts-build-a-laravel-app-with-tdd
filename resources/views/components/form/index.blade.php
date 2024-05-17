@props([
    'route' => null,
    'routeParams' => [],
    'method' => 'POST',
    'media' => false,
    'withoutCsrf' => false
])

@php
    $enctype = $media ? 'multipart/form-data' : 'application/x-www-form-urlencoded';
    $route = $route ? route($route, $routeParams) : null;
    $method = strtoupper($method);
@endphp

<form {{ $attributes->merge(['enctype' => $enctype, 'method' => $method, 'action' => $route]) }}>
    @unless ($withoutCsrf)
        @csrf   
    @endunless
    {{ $slot }}
</form>

