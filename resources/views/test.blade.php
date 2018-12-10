dsd {{ __('Users') }}

{{ $currentMenu = $currentMenu ?? 'Kosong' }}

<button>{{ __('labels.no_data') }}</button>

{{ __('messages.success', ['object' => 'data', 'action' => 'deleted']) }}