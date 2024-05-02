<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center my-5">{{__('ui.acceptedAd')}}</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 custom-overflow py-5">
                <table class="table bg-card">
                    <thead>
                      <tr>
                        <th class="bg-dropDown text-white" scope="col">{{__('ui.title')}}</th>
                        <th class="bg-dropDown text-white" scope="col">{{__('ui.price')}}</th>
                        <th class="bg-dropDown text-white" scope="col">{{__('ui.description')}}</th>
                        <th class="bg-dropDown text-white" scope="col">{{__('ui.action')}}</th>
                      </tr>
                    </thead>
                    
                    <tbody class="bg-dropDown text-white">
                        @foreach($announcementsAccepted as $announcement)
                      <tr class="">
                        <td class="bg-dropDown text-white">{{$announcement->title}}</td>
                        <td class="bg-dropDown text-white">{{$announcement->price}}</td>
                        <td class="bg-dropDown text-white text-truncate">{{Str::of($announcement->description)->limit(10)}}</td>
                        <td class="bg-dropDown text-white">
                            <div class="d-flex">
                          
                                <form class="bg-dropDown"  action="{{route('goBackAnnouncement', $announcement)}}" method="POST" >
                                  @method('put')

                                  
                                  @csrf
                                  <button class="btn btn-categorie-roll">{{__('ui.rirevisiona')}}</button>
                                </form>
                            </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <h2 class="text-center my-5">{{__('ui.rejectedAd')}}</h2>


    <div class="container">
        <div class="row">
            <div class="col-12 custom-overflow py-5">
                <table class="table bg-card mb-5">
                    <thead>
                      <tr>
                        <th  class="bg-dropDown text-white" scope="col">{{__('ui.title')}}</th>
                        <th  class="bg-dropDown text-white" scope="col">{{__('ui.price')}}</th>
                        <th  class="bg-dropDown text-white" scope="col">{{__('ui.description')}}</th>
                        <th  class="bg-dropDown text-white" scope="col">{{__('ui.action')}}</th>
                      </tr>
                    </thead>
                    <tbody class="bg-dropDown text-white">
                        @foreach($announcementsRejected as $announcement)
                      <tr>
                        <td class="bg-dropDown text-white">{{$announcement->title}}</td>
                        <td class="bg-dropDown text-white">{{$announcement->price}}</td>
                        <td class="bg-dropDown text-white">{{Str::of($announcement->description)->limit(10)}}</td>
                        <td class="bg-dropDown text-white">
                            <div class="d-flex">
                                <a class="btn btn-danger" href="#" onclick="event.preventDefault(); document.querySelector('#form-nullable').submit()"> {{__('ui.rirevisiona')}}</a>
                                <form id="form-nullable" action="{{route('goBackAnnouncement', $announcement)}}" method="POST" class="d-none">
                                  @method('put')
                                  @csrf
                                </form>
                            </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>


</x-layout>