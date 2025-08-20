@php
    // Pastikan JSON valid
    $buttonsArray = [];
    if (!empty($json[0])) {
        $raw = $json[0]; // data JSON

        $buttonsArray = is_string($raw) ? json_decode($raw, true) : $raw;
        if (!is_array($buttonsArray)) {
            $buttonsArray = [];
        }
    }
    $model = $json[1] ?? null; // model class
    $id = $json[2];
    $id_status = $json[3];
@endphp

{{-- {{ dd($model, auth()->user()->can('view_dukung', App\Models\Permohonan::class)) }} --}}
@if ($buttonsArray)
    @can($buttonsArray['permission'] ?? '', $model)
        <center>
            <a href="{{ route($buttonsArray['url'], ['id_permohonan' => $id]) ?? '#' }}">
                <button class="btn btn-sm btn-{{ $buttonsArray['color'] ?? 'primary' }}">
                    @if (!empty($buttonsArray['icon']))
                        <i class="{{ $buttonsArray['icon'] }}"></i>
                    @endif
                    {{ $buttonsArray['text'] ?? '' }}
                </button>
            </a>
        </center>
    @endcan
@else
    {{ App\Helpers\General::GetOneDataFromModel(App\Models\Status_permohonan::class, [], 'id', $id_status)->name }}
@endif
