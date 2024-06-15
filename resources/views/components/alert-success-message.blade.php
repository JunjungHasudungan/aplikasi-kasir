@props(['on'])

<div x-data="{ shown: false, timeout: null }"
     x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
     x-show.transition.out.opacity.duration.1500ms="shown"
     x-transition:leave.opacity.duration.1500ms
     style="display: none;"
    {{ $attributes->merge([
        'class' => 'flex items-center p-4 mb-1 text-sm text-green-800 dark:text-green-400',
        'role'  => "alert"
        ]) }}>
    {{ $slot->isEmpty() ? 'Saved.' : $slot }}
</div>
