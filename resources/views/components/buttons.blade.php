@php
    // Pastikan JSON valid
    $buttonsArray = [];
    if (!empty($json[0])) {
        $raw = $json[0]; // data JSON
        $model = $json[1] ?? null; // model class

        $buttonsArray = is_string($raw) ? json_decode($raw, true) : $raw;
        if (!is_array($buttonsArray)) {
            $buttonsArray = [];
        }
    }
@endphp

@can($buttonsArray['permission'] ?? '', App\Models\Status_permohonan::class)
    <a href="{{ $buttonsArray['url'] ?? '#' }}">
        <button class="btn btn-{{ $buttonsArray['color'] ?? 'primary' }}">
            @if (!empty($buttonsArray['icon']))
                <i class="{{ $buttonsArray['icon'] }}"></i>
            @endif
            {{ $buttonsArray['text'] ?? '' }}
        </button>
    </a>
@endcan
