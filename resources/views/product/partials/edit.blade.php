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
        <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" min="0" :value="old('price', $product->price)" autocomplete="price" />
        <x-input-error class="mt-2" :messages="$errors->get('price')" />
    </div>
    <div>
        <x-input-label for="unit" :value="__('Đơn vị tính')" />
        <x-text-input id="unit" name="unit" type="text" class="mt-1 block w-full" :value="old('unit', $product->unit)" maxlength="20" autocomplete="unit" />
        <x-input-error class="mt-2" :messages="$errors->get('unit')" />
    </div>
    <div>
        <x-input-label :value="__('Chọn hình ảnh')" />
        <x-product-image-input :image="$product->image"></x-product-image-input>
        <x-input-error class="mt-2" :messages="$errors->get('image')" />
    </div>
    <div class="space-x-2">
        <a href="/product" class="btn btn-cancel">Huỷ</a>
        <button class="btn btn-primary" type="submit">{{ __('Lưu') }}</button>
    </div>
</form>
