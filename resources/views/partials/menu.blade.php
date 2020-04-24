@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">@lang('main.home')</a>

            <a href="">{!! \Illuminate\Support\Facades\Auth::user()->name; !!}
            @if(\Illuminate\Support\Facades\Auth::user()->isOnline())
                <i title="@lang('main.online')" class="fas fa-circle icon-online"></i></a>
            @else
                <i title="@lang('main.offline')" class="fas fa-circle icon-offline" ></i></a>
            @endif
        @else
            <a href="{{ route('login') }}">@lang('auth.login')</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">@lang('auth.register')</a>
            @endif
        @endauth
        @include('partials.lang')
    </div>
@endif