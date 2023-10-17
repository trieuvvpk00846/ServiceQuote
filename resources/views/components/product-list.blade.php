<div class="flex flex-col gap-1">
    <div class="-order-2">{{ $products->links() }}</div>
    @forelse ($products as $item)
        @php
            $classes = '';
            if ($item->id === request()->product?->id) {
                $classes = 'shadow-primary-500 -order-1 ';
            }
        @endphp
        <div class="{{ $classes }} overflow-hidden bg-white p-4 shadow-sm sm:rounded-lg">
            <div class="flex flex-row gap-4">
                <x-product-image :image="$item->image"></x-product-image>
                <div class="flex w-full flex-col text-gray-600">
                    <div class="flex">
                        <p class="line-clamp-2 text-justify text-base font-bold">{{ $item->name }}</p>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <p class="text-base">{{ $item->price }} đ</p>
                        <p class="text-sm">{{ $item->unit ? "($item->unit)" : '' }}</p>
                    </div>
                    <div class="flex h-full flex-row items-end justify-between">
                        <div>
                            <p class="text-sm text-gray-400">Cập nhập: {{ $item->updated_at }}</p>
                        </div>
                        <div class="flex flex-row gap-2">
                            <form action="{{ route('product.edit', $item->id) }}" method="GET">
                                @csrf
                                <button class="btn btn-xs btn-edit">Sửa</button>
                            </form>
                            <form action="{{ route('product.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-xs btn-delete">Xoá</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="flex justify-center bg-white p-8 shadow-sm sm:rounded-lg">
            <p class="text-lg uppercase">Chưa có sản phẩm</p>
        </div>
    @endforelse
    {{ $products->links() }}
</div>
