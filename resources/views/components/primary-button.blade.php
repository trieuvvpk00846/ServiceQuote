<div class="">
    <button
        {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary']) }}>
        {{ $slot }}
    </button>
</div>
