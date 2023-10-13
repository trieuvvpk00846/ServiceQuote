<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="self-center">
                <h2 class="align-middle text-xl font-semibold leading-tight text-gray-800">
                    {{ __('Sản phẩm - Phụ tùng') }}
                </h2>
            </div>
            <div class="w-1/3">
                <label class="relative block w-full">
                    <span class="sr-only">Tìm kiếm</span>
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>
                    <input
                        class="w-full rounded-full border border-slate-300 bg-white py-2 pl-9 pr-3 shadow-sm placeholder:italic placeholder:text-slate-400 focus:border-primary-500 focus:outline-none focus:ring-1 focus:ring-primary-500 sm:text-base"
                        placeholder="Tìm kiếm..." type="text" name="search" />
                </label>
            </div>
        </div>
    </x-slot>
    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-6">
            <div class="flex flex-row space-x-4">
                <div class="basis-1/3 px-2">
                    <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                        @if (request()->routeIs('product.index'))
                            <div>
                                <p class="text-lg font-bold">Thêm mới</p>
                            </div>
                            @include('product.partials.create')
                        @elseif (request()->routeIs('product.edit'))
                            <div>
                                <p class="text-lg font-bold">Chỉnh sửa</p>
                            </div>
                            @include('product.partials.edit')
                        @endif
                        <x-notification-message :status="session('status')"></x-notification-message>
                    </div>
                </div>
                <div class="basis-2/3 space-y-4">
                    <x-product-list></x-product-list>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
