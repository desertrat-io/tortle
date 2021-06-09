<header class="bg-cyan pt-1 pl-1 block text-white relative" id="tortle-header">
    <img class="inline-block" src="{{ asset('images/logos/tortle.png') }}" alt="{{ __('titles.main') }}"/>

    <div class="inline-block align-middle">
        <h3 class="text-6xl mb-0.5">{{ __('titles.main') }}</h3><br/>
        <h5 class="text-2xl">{{ __('titles.main_subtitle') }}</h5>
    </div>

    <nav id="tortle-top-nav" class="absolute bottom-0 right-0">
        <ul class="tortle-h-list tortle-link-list">
            <li><a class="hover:bg-cyan-darker" href="{{ route('home') }}">{{ __('links.home') }}</a></li>
            <li><a class="hover:bg-cyan-darker" href="{{ route('register') }}">{{ __('links.sign_up') }}</a></li>
            <li><a class="hover:bg-cyan-darker" href="#">{{ __('links.login') }}</a></li>
        </ul>
    </nav>
</header>
