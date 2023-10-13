@props(['image', 'where'])
@if ($where == 'product-edit')
    @if ($image)
        <div class="aspect-square w-full flex-none rounded-xl border-2 border-dashed border-neutral-300">
            <img src="{{ asset('storage' . $image->product_images) }}" alt="" class="aspect-square rounded-xl object-cover">
        </div>
    @endif
@else
    <div class="aspect-square w-32 flex-none rounded-xl border-2 border-dashed border-neutral-300">
        @if ($image)
            <img src="{{ asset('storage' . $image->product_images) }}" alt="" class="aspect-square rounded-xl object-cover">
        @else
            <x-svg-image></x-svg-image>
        @endif
    </div>
@endif
