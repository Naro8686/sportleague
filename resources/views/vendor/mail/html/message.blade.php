@component('mail::layout')
    @php
        use App\Models\Settings;
        $reset = Settings::where('title', 'Reset')->pluck('content')->first();
        $reset = json_decode($reset, true);
    @endphp
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ $reset['manager'] }}
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
        @endcomponent
    @endslot
@endcomponent
