@props(['color', 'contenu'])
<div {{ $attributes->merge(['class'=>'py-4'])}} style="color: {{$color}}"><h2>{{ $contenu }}</h2>
    {{ $slot }}
</div>