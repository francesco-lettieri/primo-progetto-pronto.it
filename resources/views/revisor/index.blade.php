<x-layout>

    @if (session('message'))
    <div class="alert alert-success" id="flashMessage">
        {{ session('message') }}
    </div>
    @endif
    
    {{-- messaggio accesso negato,solo revisore --}}
    @if (session('denied'))
    <div class="alert alert-danger" id="flashMessage">
        {{ session('denied') }}
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" d-flex mt-3 justify-content-center">
                    @if($announcement_to_check)
                    <h1 class=" title-revisor text-center my-3 display-1 bold ">
                       {{__('ui.ifAnnouncement')}} 
                    </h1>
                    @else
                    <h1 class=" title-revisor d-flex text-center align-items-center mt-5 display-1 bold">
                        {{__('ui.ifNotAnnouncement')}}
                    </h1>
                    <div class="custom-footer-revisor">

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    

    @if ($announcement_to_check)
        <div class="container mb-5">
            <div class="row justify-content-center">
                <!-- Colonna per il carosello -->
                <div class=" col-12 col-md-8 p-0">
                    <div class="card bg-card carosello-custom" >
                        <div id="showCarousel" class="carousel slide carosello-custom">
                            @if ($announcement_to_check->images)
                                <div class="carousel-inner carosello-custom card text-white me-4 p-3 mb-5 rounded">
                                    @foreach ($announcement_to_check->images as $image)
                                    {{-- @dd($im) 
                                        src="{{ Storage::url($image->getUrl(400,300)) }}"--}}
                                        <div class="carousel-item @if ($loop->first) active @endif">
                                            <img src="{{$image->getUrl(400,300) }}" class="card-img-top bg-black" alt="Foto normale">
                                            <div class="mt-3">
                                                <h5 class="tc-accent">Tags</h5>
                                                <div class=" bg-col-carosello p-2">
                                                    @if($image->labels)
                                                    @foreach($image->labels as $label)
                                                    <p class="d-inline">{{$label}}</p>
                                                    @endforeach
                                                    @endif
                                                </div>
                                                <div class="bg-col-carosello p-2">
                                                    <h5 class="tc-accent">{{ __('ui.revisorImg') }}</h5>
                                                    <p>{{ __('ui.adults') }}: <span
                                                            class="{{ $image->adult }}"></span></p>
                                                    <p>{{ __('ui.satire') }}: <span
                                                            class="{{ $image->spoof }}"></span></p>
                                                    <p>{{ __('ui.medicine') }}: <span
                                                            class="{{ $image->medical }}"></span></p>
                                                    <p>{{ __('ui.violence') }}: <span
                                                            class="{{ $image->violence }}"></span></p>
                                                    <p>{{ __('ui.winkingContent') }}: <span
                                                            class="{{ $image->racy }}"></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                               <div class="carosuel-item active banner-image ">
                                <img class="" src="{{asset('/public/img/default-img.jpg')}}" alt="Immagine di default">
                               </div>
                            @endif
                            <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#showCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden ">Next</span>
                            </button>
                        </div>
                        <div class="text-center">
                            <h5 class="card-title text-white">{{ __('ui.title') }}: {{ $announcement_to_check->title }}
                            </h5>
                            <p class="card-text text-white">{{ __('ui.description') }}:
                                {{ $announcement_to_check->description }}</p>
                            <p class="card-footer text-white">{{ __('ui.pubblicato') }}
                                {{ $announcement_to_check->created_at->format('d/m/Y') }}</p>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-between">
                                        <form
                                            action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                                            method="post">
                                            @csrf
                                            @method ('PATCH')
                                            <button tipe="submit"
                                                class=" accept-revisor-btn-custom btn btn-success shadow m-2">{{ __('ui.accept') }}</button>
                                        </form>
                                        <form
                                            action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                                            method="post">
                                            @csrf
                                            @method ('PATCH')
                                            <button tipe="submit"
                                                class=" reject-revisor-btn-custom btn btn-danger shadow m-2">{{ __('ui.reject') }}</button>
                                        </form>
                                    </div>
    
                                </div>
    
                        </div>
                    </div>
                </div>
          
            </div>
        </div>
    @endif

</x-layout>