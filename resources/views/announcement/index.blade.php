<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <h1 class=" text-center my-5 py-3 display-2 bold">{{__('ui.allAnnouncement')}}</h1>
            </div>
        </div>
    </div>
    
    
    <div class="container">
        <div class="row">
            <div class="col-12 custom-index">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="row justify-content-center">
                                @forelse($announcements as $announcement)
                                <div class=" col-12 col-md-8 col-lg-4 d-flex justify-content-center">
                                    <div class="card text-white mx-2 p-3 mb-5 rounded bg-card brd-card" style="width: 18rem height: 10rem;">
                                        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/400/300'}}" class="card-img-top bg-black" alt="foto normale">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $announcement->title }}</h5>
                                            <p class="card-text">€{{ $announcement->price }}</p>
                                            <p class="card-text text-truncate">{{ $announcement->description }}</p>
                                            <a href="{{route('showAnnouncement',compact('announcement'))}}" class="btn button-38 shadow py-2">{{__('ui.Visualizza')}}</a>
                                            <a href="{{route('showPage',['category'=>$announcement->category])}}" class="btn btn-categorie ms-2 shadow">
                                                {{ $announcement->category->name }}</a>
                                                <p class="card-footer mt-3">{{__('ui.pubblicato')}} {{ $announcement->created_at->format('d/m/Y') }}-{{__('ui.author')}}:{{$announcement->user->name ?? ''}}</p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <div class="alert alert-warning py-3 shadow">
                                        <p class="lead">{{__('ui.notAnnouncement')}}</p>
                                    </div>
                                </div>
                                @endforelse
                                {{$announcements->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </x-layout>