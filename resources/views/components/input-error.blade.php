@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'alert alert-danger p-2']) }}>
        @foreach ((array) $messages as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
@endif
