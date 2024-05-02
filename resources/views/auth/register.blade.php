<x-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form class="rounded-4 px-4  custom-form rounded bg-card brd-card mb-5" method="POST" action="{{ route('register')}}">
                    @csrf
                <h1 class="text-center mb-2 display-3 mt-3">{{__('ui.register')}}</h1>

                    <div class="mb-3 text-center">
                        <label for="inputName" class="form-label text-center text-white mb-2">{{__('ui.name')}}</label>
                        <input name='name' type="text" class="form-control" id="inputName"
                            aria-describedby="nameHelp" placeholder="{{__('ui.name')}}">
                        @error('name') <span class="error text-danger">{{__('ui.errorName')}}</span> @enderror

                    </div>
    
                    <div class="mb-3 text-center">
                        <label for="inputEmail" class="form-label text-center text-white mb-2">Email</label>
                        <input name="email" type="email" class="form-control" id="inputEmail"
                            aria-describedby="emailHelp" placeholder="Email">
                        @error('email') <span class="error text-danger">{{__('ui.errorEmail')}}</span> @enderror

                    </div>
    
                    <div class="mb-3 text-center">
                        <label for="inputPassword" class="form-label text-center text-white mb-2">Password</label>
                        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
                        @error('password') <span class="error text-danger">{{__('ui.errorPassword')}}</span> @enderror

                    </div>
    
                    <div class="mb-3 text-center">
                        <label for="inputPasswordConfirmation" class="form-label text-center text-white mb-2">{{__('ui.confirmPassword')}}</label>
                        <input name="password_confirmation" type="password" class="form-control" id="inputPasswordConfirmation"
                            placeholder="{{__('ui.confirmPassword')}}">
                        @error('password_confirmation') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="d-flex">
                        <div>
                            <button type="submit" class="btn button-38 shadow mt-5 mb-2">{{__('ui.register')}}</button>
                        </div>
                        <div>
                          <p class=" ms-5 mt-5 text-white mb-4">{{__('ui.here')}} <br> <a href="{{ route('login') }}">{{__('ui.login')}}</a></p>
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>

