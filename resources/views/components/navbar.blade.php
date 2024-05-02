            <nav class="navbar navbar-expand-lg sticky-top bg-nav p-0 ">
                <div class="container-fluid ">
                    <a class="navbar-brand acc text-white fw-bolder logo" href="{{ route('homePage') }}"></a>
                    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                        
                        {{-- INIZIO DROP CATEGORIE  --}}
                        <li class="nav-item dropdown">
                            <a class=" nav-hand nav-link dropdown-toggle acc ms-2 text-white fw-bolder active-custom  @if(Route::currentRouteName()=='showPage') active @endif" aria-current="page"
                            href="{{ route('indexPage') }}" " href="#"
                            id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('ui.categories') }}
                        </a>
                        <ul class="dropdown-menu bg-dropDown" aria-labelledby="categoriesDropdown">
                            @foreach ($categories as $category)
                            <li><a class="dropdown-item drop-hover acc text-white"
                                href="{{ route('showPage', compact('category')) }}">{{ __("ui.$category->name") }}</a>
                            </li>
                            @endforeach
                            
                        </ul>
                    </li>
                    {{-- FINE DROP CATEGORIE  --}}
                    
                    <li  onclick="changeBackground('#b60226')" class="nav-item ms-2">
                        <a class="nav-link fw-bolder active-custom @if(Route::currentRouteName()=='indexPage') active @endif" aria-current="page"
                        href="{{ route('indexPage') }}">{{ __('ui.allAnnouncement') }}</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link ms-2 fw-bolder active-custom @if(Route::currentRouteName()=='createPage') active @endif"
                        href="{{ route('createPage') }}">{{ __('ui.oneAnnouncement') }}</a>
                    </li>
                    {{-- inizio funzione revisore --}}
                    @if (Auth::user() && Auth::user()->is_revisor)
                    <li class="nav-item dropdown ms-2 ">
                        <a class="nav-link dropdown-toggle text-white  fw-bolder active-custom   @if(Route::currentRouteName()=='indexRevisorHome') active @endif  @if(Route::currentRouteName()=='indexRevisor') active @endif " href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.revisorAnnouncement') }}
                        {{-- COUNTER ESTERNO ALLA NAVBAR  --}}
                        
                      
                            
                            {{-- FINE COUNTER ESTERNO  --}}
                        </a>
                        <ul class="dropdown-menu bg-dropDown">
                            <li>
                                <a class="nav-link drop-hover btn btn-outline-success btn-sm position-relative text-white "
                                aria-current="page" href="{{ route('indexRevisorHome') }}">
                                {{ __('ui.ZonaRevisore') }}
                                <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-3">
                                {{ App\Models\Announcement::toBeRevisionedCount() }}
                                <span class="visually-hidden">Messaggio non letto</span>
                            </span>
                        </a>
                    </li>
                    <li><a class="dropdown-item drop-hover text-white "
                        href="{{ route('indexRevisor') }}">{{ __('ui.AnnunciRevisore') }}</a></li>
                    </ul>
                </li>
              
            @endif
            
            {{-- BARRA DI RICERCA  --}}
            
            <form action="{{ route('searchPage') }}" method="GET" class="d-flex ms-3">
                <input name="searched" type="search" class="form-control m-0" placeholder="{{ __('ui.cerca') }}"
                aria-label="search">
                <button class="btn " type="submit"><i
                    class="fa-solid fa-magnifying-glass text-white m-0"></i></button>
                </form>
                
            </ul>
            
            
            
            
            {{--  FINE BARRA DI RICERCA  --}} 
            
            
            {{-- messaggio autenticazioe --}} 
            
            
            <div class="d-flex align-items-center">
                @auth
                <ul class="ms-auto">
                    <li class="nav-item dropdown  d-flex align-items-center mt-2">
                        <a class="nav-link dropdown-toggle text-white fw-bolder d-flex align-items-center" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.hello') }}, {{ Auth::user()->name }}
                    </a>
                    
                    <ul class="dropdown-menu bg-dropDown">
                        <li><a class="dropdown-item drop-hover text-white"
                            onclick="event.preventDefault();document.querySelector('#form-logout').submit();">Logout
                            <form method="post" action="{{ route('logout') }}" id="form-logout" class="d-none">
                                @csrf</form>
                            </a>
                        </li>
                    </li> 
                </ul>
                @endauth
                @guest
                <ul class="ms-auto">
                    <li class="nav-item dropdown ms-1 ">
                        <a class="nav-link dropdown-toggle text-white fw-bolder mt-2" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.authentication') }}
                    </a>
                    <ul class="dropdown-menu bg-dropDown">
                        <li >
                            <a class="dropdown-item drop-hover  text-white " href="{{ route('register') }}">
                            {{ __('ui.register') }}</a>
                        </li>
                            <li>
                                <a class="dropdown-item drop-hover text-white" href="{{ route('login') }}">Login</a>
                            </li>
                        </li>
                    </ul>
                </ul>
                @endguest
            </div>
            
            
            
            
            
            
            
            
            <ul class="d-flex align-items-center mt-2 ">
                <li class="nav-item">
                    <x-locale lang="it" nation="it" />
                </li>
                
                <li class="nav-item mx-3">
                    <x-locale lang="en" nation="gb" />
                </li>
                
                <li class="nav-item">
                    <x-locale lang="es" nation="es" />
                </li>
            </ul>
            
            
            
        </div>
    </div>
</nav>
