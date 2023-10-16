@props(['status'])
@php
    switch ($status) {
        case 'product-stored':
            $message = 'Tạo thành công!';
            break;
        case 'product-updated':
            $message = 'Sửa thành công!';
            break;
        default:
            break;
    }

    $classes = 'self-center text-base text-primary-700';
@endphp
@if ($status)
    <div class="flex pt-4">
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 6000)" {{ $attributes->merge(['class' => $classes]) }}>
            {{ $message }}
        </p>
    </div>
@endif
