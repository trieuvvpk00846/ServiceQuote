@forelse ($products as $item)
    @if ($item->id === request()->product?->id)
        <div class="overflow-hidden bg-white p-4 shadow-sm shadow-primary-500 sm:rounded-lg">
        @else
            <div class="overflow-hidden bg-white p-4 shadow-sm hover:shadow-md sm:rounded-lg">
    @endif
    <div class="flex flex-row space-x-4">
        <x-product-image :image="$item->images" :where="''"></x-product-image>
        <div class="flex w-full flex-col text-gray-600">
            <div class="flex">
                <p class="line-clamp-2 text-justify text-base font-bold">{{ $item->name }}</p>
            </div>
            <div class="flex flex-row items-center space-x-2">
                <p class="text-base">{{ $item->price }} đ</p>
                <p class="text-sm">({{ $item->unit }})</p>
            </div>
            <div class="flex h-full flex-row items-end justify-between">
                <div>
                    <p class="text-sm text-gray-400">Ngày nhập: {{ $item->created_at }}</p>
                </div>
                <div class="flex flex-row space-x-2">
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
    <div>Chưa có sản phẩm</div>
@endforelse
