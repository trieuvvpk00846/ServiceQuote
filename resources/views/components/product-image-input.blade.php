@props(['image'])
@php
    $src = $image ? asset('storage' . $image->product_image) : '#';
@endphp

<label class="relative mt-1 block space-y-2">
    <img id="preview" name="preview" src="{{ $src }}" class="{{ $image ?? 'sr-only' }} aspect-square rounded-xl object-cover">
    <button type="button" id="removeImage()" class="{{ $image ?? 'sr-only' }} absolute right-2 top-0" onclick="removeImage(this)">
        <x-svg-x-circle></x-svg-x-circle>
    </button>
    <input type="checkbox" name="removeImageFlg" id="removeImageFlg" class="sr-only">
    <input type="file"
        class="block w-full text-sm text-slate-500 file:mr-4 file:rounded-lg file:border-0 file:bg-violet-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-violet-700 hover:file:bg-violet-100"
        name="image" id="image" accept="image/*" onchange="previewImage(this)" :value="old('image')" />
</label>
<script>
    function previewImage(input) {
        var preview = document.getElementById('preview');
        var removeImage = document.getElementById('removeImage()');

        var file = input.files[0];
        preview.src = '';
        preview.classList.add('sr-only');

        if (file && file.type.startsWith('image/')) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('sr-only');

                removeImage.classList.remove('sr-only');

                var removeImageFlg = document.getElementById('removeImageFlg');
                removeImageFlg.checked = false;
            }
            return reader.readAsDataURL(file);
        }
    }

    function removeImage(button) {
        var preview = document.getElementById('preview');
        preview.src = '';
        preview.classList.add('sr-only');

        button.classList.add('sr-only');

        var input = document.getElementById('image');
        input.value = '';

        var removeImageFlg = document.getElementById('removeImageFlg');
        removeImageFlg.checked = true;
    }
</script>
