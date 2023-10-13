<form method="POST" action="{{ route('product.store') }}" class="space-y-6" enctype="multipart/form-data">
    @csrf
    <div>
        <x-input-label for="name" class="after:ml-0.5 after:text-red-500 after:content-['*']" :value="__('Tên sản phẩm / phụ tùng')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" maxlength="155" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
    <div>
        <x-input-label for="price" :value="__('Giá bán')" />
        <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" min="0" :value="old('price', 0)" required autofocus autocomplete="price" />
        <x-input-error class="mt-2" :messages="$errors->get('price')" />
    </div>
    <div>
        <x-input-label for="unit" class="after:ml-0.5 after:text-red-500 after:content-['*']" :value="__('Đơn vị tính')" />
        <x-text-input id="unit" name="unit" type="text" class="mt-1 block w-full" :value="old('unit')" required maxlength="20" autofocus autocomplete="unit" />
        <x-input-error class="mt-2" :messages="$errors->get('unit')" />
    </div>
    <div>
        <label class="block">
            <img src="#" alt="" id="preview" class="aspect-square rounded-xl object-cover">
            <input type="file"
                class="block text-sm text-slate-500 file:mr-4 file:rounded-lg file:border-0 file:bg-violet-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-violet-700 hover:file:bg-violet-100"
                x-data="{ show: false }" x-show="show"
                name="images" id="images" onchange="previewImage()" />
        </label>

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
