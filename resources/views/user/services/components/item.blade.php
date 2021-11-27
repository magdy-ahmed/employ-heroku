<div class="col-md-3 col-sm-6 col-12 p-2">
    <div class="card h-100" >
        @auth
            <a href="#" onclick="changeAction({{$service->id}})" data-toggle="modal" data-target="#chat-service-modal" class="text-right chat-icon"><i class="fas fa-comment"></i></a>
        @else
            <a href="#" data-toggle="modal" data-target="#register-modal" class="text-right chat-icon"><i class="fas fa-comment"></i></a>
        @endauth

        <div class="card__choice position-absolute left ">
        @if (isset($favorites))

        <button onclick="event.preventDefault();sendRequestDislike({{$service->id}});"
        data-action="dislike" class=" font-25  text-danger">
        <svg viewBox="0 0 512 512" width="100" title="heart-broken">
            <path d="M473.7 73.8l-2.4-2.5c-46-47-118-51.7-169.6-14.8L336 159.9l-96 64 48 128-144-144 96-64-28.6-86.5C159.7 19.6 87 24 40.7 71.4l-2.4 2.4C-10.4 123.6-12.5 202.9 31 256l212.1 218.6c7.1 7.3 18.6 7.3 25.7 0L481 255.9c43.5-53 41.4-132.3-7.3-182.1z" /></svg>
        </button>

        @else
            @guest
                <a href="#"  data-toggle="modal" data-target="#register-modal">
                    <button class=" font-25  text-danger" >
                        <svg viewBox="0 0 512 512" width="100" title="heart"><path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" /></svg>
                    </button>
                </a>
            @endguest

            @auth

                <button
                    onclick="event.preventDefault();sendRequest({{$service->id}});"

                    data-action="like" class=" font-25  text-danger" >
                    <svg viewBox="0 0 512 512" width="100" title="heart"><path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z" /></svg>
                </button>
            @endauth
        @endif


        </div>
        <img class="d-block m-auto"
         height="200px" width="200px"
         src=" {{isset($service->img) ? asset('storage/'.$service->img) : 'storage/basick/service.png'}}" />
        <div class="card-footer h-100 d-block">

            <div class="d-flex flex-row bd-highlight ">

                <div class="bolder p-1 pl-2 text-info text-center">
                الســعر</div>
                <div class="  p-1 pl-2 text-danger text-center sellery ">
                    {{  $service->salery * (100-$service->discount) /100  }}
                </div>
                <div class="text-center p-1 pl-2 discount text-danger sellery align-bottom">
                    {{  $service->salery}}
                </div>
            </div>

            <div class="d-flex flex-row bd-highlight ">
                <div class="p-1  pl-2 bolder text-dark">الخـدمة</div>
                <div class="pb-1 pt-1 bolder text-secondary">
                <a href="{{ route('services.show',$service->id) }}">{{ $service->title }}</a></div>
            </div>
            <div class="d-flex flex-row bd-highlight ">
                <div class="p-1 pl-2 bolder text-dark">المنشئة</div>
                <div class="pb-1 pt-1 bolder text-secondary">
                <a href="{{ route('places.show',$service->place->id) }}">{{ $service->place->name }}</a></div>
            </div>
            <p>
                <h5 class=" mb-3 bolder text-info text-center">الوصف</h5>

                <?php echo mb_substr($service->excerpt,0,100,'utf-8'); ?>
            </p>
        </div>
    </div>
</div>


{{-- <form class="d-none form-favorite" id="service-favorite-{{$service->id}}"
    action="{{ route( 'services-favorite.create' , $service->id) }}" method="POST">
    @csrf
    @method('POST')
</form> --}}
