<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gradient-to-r from-orange-300 to-red-400 rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-gradient-to-r hover:from-orange-400 hover:to-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
