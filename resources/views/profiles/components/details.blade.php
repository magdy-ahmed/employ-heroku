<div class="text-center" >
    <div class="card app-details">
        <div class="card-header text-center">
            <a href="{{route('profile.edit')}}">  بيانات المسخدم<i class="fas fa-pencil-alt"></i></a>
        </div>
        <div class="card-body ">
            <div class="container">
                <div class="row">
                    <div class="label-img col-xl-3 text-center" >
                        <form id="form-img" method="POST" enctype="multipart/form-data" action="{{ route('profile.updateImg') }}">
                            @csrf
                            @method('PUT')
                             <label  for="img">
                                <img  width="90px" height="90px" src="{{ asset(isset($profile->img) ? 'storage/'.$profile->img: 'storage/basick/profile.png')}}"/>
                             <label>
                            <input type="file" class="d-none"   accept="image/*" name='img'  id="img" aria-describedby="img"
                                onchange="event.preventDefault();
                                document.getElementById('form-img').submit();">
                        </form>
                    </div>
                    <div class="col-xl-9 pt-xl-2">
                        <div>
                            <span>الأســــــــــم  &nbsp: </span>
                            <span>&nbsp {{$profile->user->name}}</span>
                        </div>
                        <div>
                            <span>الوظـــــــيفة  &nbsp: </span>
                            <span>&nbsp {{isset($profile->category) ? $profile->category->name :'غير محددة'}}</span>
                        </div>
                        <div>
                            <span>نوع الحسـاب &nbsp: </span>
                            <span>&nbsp {{$profile->user->role[0]->name}}</span>
                        </div>
                        <div>
                            <span>أسم الوظيفة &nbsp: </span>
                            <span>&nbsp {{$profile->title}}</span>
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <div class='bolder'>التخصصـــات  </div>
                    @if (!isset($profile->tags))
                        <span class="badge badge-secondary"> غير محددة </span>
                    @else
                    @foreach ($profile->tags as $tag )
                        <span class="badge badge-secondary">{{$tag->name}}</span>
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="card app-details">
        <div class="card-header text-center">
            أحصائيات الحساب
        </div>
        <div class="card-body ">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
    </div>
</div>
