<div class="field">
    <label for="name">Nama produk</label>
    <input id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required maxlength="150">
    @error('name')<p class="error">{{ $message }}</p>@enderror
</div>
<div class="field">
    <label for="category_id">Kategori</label>
    <select id="category_id" name="category_id" required>
        <option value="">Pilih kategori</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')<p class="error">{{ $message }}</p>@enderror
</div>
<div class="field">
    <label for="description">Deskripsi</label>
    <textarea id="description" name="description" rows="3">{{ old('description', $product->description ?? '') }}</textarea>
</div>
<div class="field">
    <label for="price">Harga (rupiah)</label>
    <input id="price" type="number" min="0" step="100" name="price" value="{{ old('price', $product->price ?? '') }}" required>
</div>
<div class="field">
    <label for="stock">Stok</label>
    <input id="stock" type="number" min="0" name="stock" value="{{ old('stock', $product->stock ?? 0) }}" required>
</div>
<div class="field">
    <label><input type="checkbox" name="is_active" value="1" style="width:auto" @checked(old('is_active', $product->is_active ?? true))> Produk aktif</label>
</div>
<button class="btn" type="submit">Simpan</button>
<a class="btn btn-secondary" href="{{ route('products.index') }}">Batal</a>
