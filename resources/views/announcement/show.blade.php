<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12  my-3 ">
                <h1 class="text-center display-3 bold">{{__('ui.announcement')}} <br> {{$announcement->title}}</h1>
            </div>
        </div>
    </div>
    {{-- INIZIO CARD  --}}
    
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
    <div class="d-flex justify-content-center mb-5">
      <div class="card bg-card" style="width: 35rem;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 p-0 mb-5">
                    <div id="carouselExample" class="carousel slide">
                      @if ($announcement->images)
                      <div class="carousel-inner">
                          @foreach ($announcement->images as $image )              
                      <div class="carousel-item @if($loop->first)active @endif">
                        <img src="{{$image->getUrl(400,300) }}" class="card-img-top bg-black" alt="Foto normale">
                      </div>
                      @endforeach 
                      </div>
                      @else
                      <div class="carousel-inner">
                          <div class="carousel-item active">
                              <img class="" src="https://picsum.photos/1300/299" class="d-block " alt="...">
                          </div>
                          <div class="carousel-item">
                              <img class="" src="https://picsum.photos/1300/300" class="d-block " alt="...">
                          </div>
                          <div class="carousel-item">
                              <img class="" src="https://picsum.photos/1300/301" class="d-block " alt="...">
                          </div>
                      </div>                 
                        @endif
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                          {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}<i class="bi bi-arrow-left-circle-fill btn-carosel"></i>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                          {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}<i class="bi bi-arrow-right-circle-fill btn-carosel"></i>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                </div>
                <div class="card-body text-white text-center">
                  <h4 class="card-title">{{ $announcement->title }}</h4>
                    <p class="card-text">{{ $announcement->price }}€</p>
                    <p class="card-text">{{ $announcement->description }}</p>
                    <a href="{{route('indexPage',compact('announcement'))}}" class="btn button-38 shadow me-3 py-2">{{__('ui.comeBack')}}</a>
                    <a href="{{route('showPage',['category'=>$announcement->category])}}" class="btn  btn-categorie shadow">
                        {{ $announcement->category->name }}</a>
                    <p class="card-footer mt-3">{{__('ui.pubblicato')}} {{ $announcement->created_at->format('d/m/Y') }}<br>{{__('ui.author')}}:{{$announcement->user->name ?? ''}}</p>
                </div>
            </div>
        </div>
      </div>
    </div>


</x-layout>