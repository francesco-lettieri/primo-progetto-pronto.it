<x-layout>


<div class="container mt-5">
  <div class="row ">
      <div class="col-12 d-flex justify-content-center mt-4">
  <form class="rounded-4   p-4 custom-form rounded bg-card brd-card mb-5 " method="POST" action="{{route('login')}}">
      @csrf
      <h1 class="text-center mb-2 display-3"> {{__('ui.login')}}</h1>
      <div class="mb-3 text-center">  
        <label for="inputPassword" class="form-label text-white text-center mt-4"> Email</label>
          <input name="email" type="email" class="form-control" id="inputName" aria-describedby="emailHelp" placeholder="Email">
          @error('email') <span class="error text-danger">{{__('ui.errorEmail')}}</span> @enderror

        </div>
  
      <div class="mb-3 text-center">
        <label for="inputPassword" class="form-label mt-5 text-white text-center">Password</label>
        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
        @error('password') <span class="error text-danger">{{__('ui.errorPassword')}}</span> @enderror
        
        <div class="d-flex">
          <div>
            <button type="submit" class="btn button-38 mt-5">{{__('ui.login')}}</button>
          </div>
          <div>
            <p class=" ms-5 mt-5 text-white">{{__('ui.notRegister')}} <a href="{{ route('register') }}">{{__('ui.registerNow')}}</a></p>
          </div>
        </div>

      </div>
  
      
    </form>
      </div>
  </div>
</div>
</x-layout>


