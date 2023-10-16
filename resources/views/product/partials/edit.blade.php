<form method="POST" action="{{ route('product.update', $product) }}" class="space-y-6" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div>
        <x-input-label for="name" class="after:ml-0.5 after:text-red-500 after:content-['*']" :value="__('Tên sản phẩm / phụ tùng')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" maxlength="155" :value="old('name', $product->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
    <div>
        <x-input-label for="price" :value="__('Giá bán')" />
        <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" min="0" :value="old('price', $product->price)" required autofocus autocomplete="price" />
        <x-input-error class="mt-2" :messages="$errors->get('price')" />
    </div>
    <div>
        <x-input-label for="unit" :value="__('Đơn vị tính')" />
        <x-text-input id="unit" name="unit" type="text" class="mt-1 block w-full" :value="old('unit', $product->unit)" required maxlength="20" autofocus autocomplete="unit" />
        <x-input-error class="mt-2" :messages="$errors->get('unit')" />
    </div>
    <div>
        <x-product-image :image="$product->images" :where="'product-edit'"></x-product-image>
    </div>
    <div>
        <label class="block">
            <span class="sr-only">Chọn hình ảnh</span>
            <input type="file"
                class="block w-full text-sm text-slate-500 file:mr-4 file:rounded-lg file:border-0 file:bg-violet-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-violet-700 hover:file:bg-violet-100"
                value="" name="images" />
        </label>
        <x-input-error class="mt-2" :messages="$errors->get('images')" />
    </div>
    <div class="space-x-2">
        <a href="/product" class="btn btn-cancel">Huỷ</a>
        <button class="btn btn-primary" type="submit">{{ __('Lưu') }}</button>
    </div>
</form>
