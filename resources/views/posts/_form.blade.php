<div class="mb-3">
    <label for="title" class="form-label fw-semibold">Judul postingan</label>
    <input id="title" name="title" type="text" value="{{ old('title', $post->title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror" maxlength="150"
           placeholder="Masukkan judul yang menarik" required>
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="content" class="form-label fw-semibold">Isi postingan</label>
    <textarea id="content" name="content" rows="8"
              class="form-control @error('content') is-invalid @enderror"
              placeholder="Tulis isi postinganmu di sini..." required>{{ old('content', $post->content ?? '') }}</textarea>
    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-4">
    <label for="image" class="form-label fw-semibold">Gambar (opsional)</label>
    <input id="image" name="image" type="file"
           class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp,image/*">
    <div class="form-text">Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</div>
    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
    @if (!empty($post?->image))
        <div class="mt-3">
            <p class="small text-secondary mb-2">Gambar saat ini:</p>
            <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar saat ini" style="max-width:220px;border-radius:10px">
        </div>
    @endif
</div>
