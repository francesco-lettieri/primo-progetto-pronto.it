<x-layout>
    
    @if (session('message'))
    <div class="alert alert-success" id="flashMessage">
        {{ session('message') }}
    </div>
    @endif
    
    {{-- messaggio accesso negato,solo revisore --}}
    @if (session('denied'))
    <div class="alert alert-danger " id="flashMessage">
        {{ session('denied') }}
    </div>
    @endif
    @auth
    {{-- INSERIMENTO BOTTONE COMPLETO  --}}
    @endauth
    <div class="custom-heigt">

    </div>
    {{-- INIZIO HEADER  --}}
    <header class="m-0">
        <div class="contanier imgHeader-custom mt-0">
            <div class="row m-0">
                <div class="col-12 col-lg-4 text-center title-custom justify-content-center"style="height:80vh">
                    <h1 class="acc display-1 font-presto text-center  ">Presto.it </h1>
                    
                    <h2 class="media-custom display-5 text-center text-white ">{{__('ui.subtitle')}} <br> {{__('ui.subtitle2')}}</h2> 
                    @auth
                    <div>
                        <button class="btn button-38 mt-5"><a class="nav-link" href="{{route('createPage')}}">{{__('ui.createAnnouncement')}}</a></button> 
                    </div>
                    @endauth
                </div>
                <div class="col-12 col-lg-4"></div>
                {{-- lavora con noi --}}
                <div class=" mt-5 col-12 col-md-4 display-flex-end py-0 d-flex  flex-column align-items-center justify-content-center ">
                    {{-- <h3 class="text-center text-white mt-4">{{__('ui.work')}}</h3> --}}
                    @auth
                    @if(Auth::user()->is_revisor)
                    @else
                    <div class="cnt-btn-revisor">
                        <h3 class="fw-bold text-center text-white py-2">{{__('ui.workyou')}}</h3>
                        <div>
                            <button type="button" class="text-center btn button-28 text-black mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                {{__('ui.revisorBtn')}}
                            </button>
    
                        </div>

                    </div>
                    @endif
                    @endauth
                    
                    <div class="d-flex justify-content-center">
                        
                        
                        <!-- Modal -->
                        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  ">
                                <div class="modal-content bg-card">
                                    <div class="modal-header">
                                        <h1 class=" ms-4 modal-title fs-5 text-center display-2 w-100" id="exampleModalLabel">
                                            {{__('ui.revisorBtn')}}
                                         </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h3 class="text-center mt-4">{{__('ui.work')}}</h3>
                                        <p class="fw-bold text-center text-white py-2">{{__('ui.buttonFooter')}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.close')}}</button>
                                        <a href="{{route('become.revisor')}}" class=" btn btn-confirm">{{__('ui.confirm')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </header>
    ﻿
    
    
    <div class="container">
        <div class="row">
            <div class="col-12 pt-0 mb-5 ">
                <h2 class="fw-bold text-center display-2 py-2 mt-0">{{__('ui.titleAnnouncement')}}</>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="row justify-content-center">
                        @foreach ($announcements as $announcement)
                        <div class=" col-12 col-md-8 col-lg-4  d-flex justify-content-center ">
                            <div class="card text-white pb-3 mx-2 p-3 mb-5 rounded bg-card brd-card" style="width: 15rem height: 9rem;">
                                <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/400/300'}}" class="card-img-top bg-black" alt="foto normale">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $announcement->title }}</h3>
                                    <p class="card-text"> €{{ $announcement->price }}</p>
                                    <p class="card-text text-truncate">{{ $announcement->description }}</p>
                                    <a href="{{route('showAnnouncement',compact('announcement'))}}" class="btn button-38 shadow me-2">{{__('ui.Visualizza')}}</a>
                                    <a href="{{route('showPage',['category'=>$announcement->category])}}" class="btn btn-categorie shadow">
                                        {{__("ui.".$announcement->category->name)  }}</a>
                                        <p class="card-footer mt-3">{{__('ui.pubblicato')}} {{ $announcement->created_at->format('d/m/Y') }} <br>{{__('ui.author')}}: {{$announcement->user->name ?? ''}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </x-layout>
        