<div class="user-profile">
    <div class="dropdown user-pro-body ">
        <div class="profile-image">
            {{-- @if(auth()->user()->profile->pic == null) --}}
            <img src="{{asset('plugins/images/users/hanna.jpg')}}" alt="user-img"
                        class="img-circle">
            {{-- @else
                <img src="{{asset('storage/uploads/users/'.auth()->user()->profile->pic)}}"
                        alt="user-img" class="img-circle">
            @endif --}}
        </div>
        <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> {{ auth()->user()->name }}</a></p>
    </div>
</div>