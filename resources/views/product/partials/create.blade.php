<form method="POST" action="{{ route('product.store') }}" class="space-y-6" enctype="multipart/form-data">
    @csrf
    <div>
        <x-input-label for="name" class="after:ml-0.5 after:text-red-500 after:content-['*']" :value="__('Tên sản phẩm / phụ tùng')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" maxlength="155" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
    <div>
        <x-input-label for="price" :value="__('Giá bán')" />
        <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" min="0" :value="old('price', 0)" autofocus autocomplete="price" />
        <x-input-error class="mt-2" :messages="$errors->get('price')" />
    </div>
    <div>
        <x-input-label for="unit" :value="__('Đơn vị tính')" />
        <x-text-input id="unit" name="unit" type="text" class="mt-1 block w-full" :value="old('unit')" maxlength="20" autofocus autocomplete="unit" />
        <x-input-error class="mt-2" :messages="$errors->get('unit')" />
    </div>
    <div>
        <x-input-label for="images" :value="__('Chọn hình ảnh')" />
        <x-product-images-input></x-product-images-input>
        <x-input-error class="mt-2" :messages="$errors->get('images')" />
    </div>
    <div class="flex flex-row space-x-2">
        <button class="btn btn-primary" type="submit">{{ __('Lưu') }}</button>
    </div>
</form>
<script>
    function previewImage() {
        var input = document.getElementById('images');
        var preview = document.getElementById('preview');
        var file = input.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            // preview.style.dis
        }

        reader.readAsDataURL(file);
    }
</script>
