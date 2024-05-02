<div>
    <form class=' p-2 rounded-4 text-white bg-card brd-card p-4 mb-5'  wire:submit='save'>
        <div class="mb-3 text-center">
          <label for="inputTitle" class="form-label">{{__('ui.title')}}</label>
          <input wire:model.blur='title' type="text" class="form-control" id="inputTitle" aria-describedby="titleHelp" placeholder="{{__('ui.insertTitle')}}"> 
          @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3 text-center">
          <label for="inputPrice" class="form-label">{{__('ui.price')}}</label>
          <input wire:model.blur='price' type="number" class="form-control" id="inputPrice" placeholder="{{__('ui.insertPrice')}}">
          @error('price') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3 text-center">
          <label for="inputDescription" class="form-label">{{__('ui.description')}}</label>
          <textarea wire:model.blur="description" id="inputDescription" cols="30" rows="10" placeholder="{{__('ui.descriptionAd')}}" class="form-control"></textarea>
          @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3 text-center">
          <label for="inputCategory" class="form-label text-center">{{__('ui.categories')}}</label>
          <select class="form-control mb-4" wire:model="category" id="inputCategory" >
              @foreach ($categories as $category)
              <option value="{{$category->id}}">
                {{__("ui.$category->name")  }}
              </option>
          @endforeach
        </select>
        </div>
        <div class="mb-3 text-center">
        <label for="temporary_images" class="form-label text-center">{{__('ui.imageSelect')}}</label>
          <input wire:model="temporary_images" type="file"  multiple  class="form-control @error ('temporary_images.*') is-invalid @enderror" placeholder="img"></input>
          @error('temporary_images') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>

        {{-- ANTEPRIMA FOTO  --}}
        @if (!empty($images))
        <div class="row">
          <div class="col-12">
            <p>{{__('ui.photoPreview')}}:</p>
            <div class="row border border-4 border-info rounded shadow py-4">
                @foreach ($images as $key=>$image)
                  <div class="col my-3">
                    <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                    <button class="btn btn-danger shadow d-block text-center mt-2 mx-auto" type="button" wire:click="removeImage({{$key}})">{{__('ui.delete')}}</button>
                  </div>
                @endforeach
            </div>
          </div>
        </div>  
        @endif
        <button type="submit" class="btn button-38 my-3">{{__('ui.oneAnnouncement')}}</button>
      </form>
</div>
