@props(['url'])

<div x-data="{ playing: false }">
    <canvas x-ref="canvas" {{ $attributes }} x-bind:class="{ 'hidden': playing }"></canvas>
    <img src="{{ $url }}" x-bind:class="{ 'hidden': !playing }" x-on:mouseover="playing = false" x-on:mouseout="playing = true" x-on:touchstart="playing = false" x-on:touchend="playing = true" style="display: none;">
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const canvas = document.querySelector('[x-ref="canvas"]');
            const context = canvas.getContext('2d');
            const image = new Image();
            image.src = "{{ $url }}";

            image.onload = function() {
                context.drawImage(image, 0, 0, canvas.width, canvas.height);
            };
        });
    </script>
@endpush
