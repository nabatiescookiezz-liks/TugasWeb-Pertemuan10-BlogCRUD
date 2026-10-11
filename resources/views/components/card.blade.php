<div {{ $attributes->merge(['class' => 'card post-card h-100']) }}>
    <div class="card-body p-4">
        {{ $slot }}
    </div>
</div>
