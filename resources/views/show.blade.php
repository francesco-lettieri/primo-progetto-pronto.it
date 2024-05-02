<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center display-1 bold mt-5">  {{__('ui.showCategoryTitle')}} {{__("ui.$category->name")}}</h1>
            </div>
        </div>
    </div>
    
    
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center"> 
                    @forelse($announcements as $announcement)
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
                
                    @empty
                    <div class="col-12 custom-footer d-flex flex-column align-items-center mt-5">
                        <h2 class="text-white">{{__('ui.notAnnouncement')}}</h2>
                        <h3 class="text-white m-3 fw-bold">{{__('ui.postOne')}}: <a class="btn button-38 ms-3"  href="{{route('createPage')}}">{{__('ui.oneAnnouncement')}}</a> </h3>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>