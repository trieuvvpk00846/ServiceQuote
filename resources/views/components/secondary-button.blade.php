<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-300 to-lime-400 rounded-md font-semibold text-sm text-white uppercase tracking-widest shadow-sm hover:bg-gradient-to-r hover:from-emerald-400 hover:to-lime-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
