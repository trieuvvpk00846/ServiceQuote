@props(['image'])

<div class="aspect-square w-32 flex-none rounded-xl border-2 border-dashed border-neutral-300">
    @if ($image)
        <img src="{{ asset('storage' . $image->product_image) }}" alt="" class="aspect-square rounded-xl object-cover">
    @else
        <x-svg-image></x-svg-image>
    @endif
</div>
