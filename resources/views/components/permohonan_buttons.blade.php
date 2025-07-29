@php
    // Pastikan JSON valid
    $buttonsArray = [];
    if (!empty($json[0])) {
        $raw = $json[0]; // data JSON
        $model = $json[1] ?? null; // model class
        $id = $json[2];

        $buttonsArray = is_string($raw) ? json_decode($raw, true) : $raw;
        if (!is_array($buttonsArray)) {
            $buttonsArray = [];
        }
    }
@endphp

@can($buttonsArray['permission'] ?? '', $model)
    <a href="{{ route($buttonsArray['url'], ['id_permohona' => $id]) ?? '#' }}">
        <button class="btn btn-sm btn-{{ $buttonsArray['color'] ?? 'primary' }}">
            @if (!empty($buttonsArray['icon']))
                <i class="{{ $buttonsArray['icon'] }}"></i>
            @endif
            {{ $buttonsArray['text'] ?? '' }}
        </button>
    </a>
@endcan
