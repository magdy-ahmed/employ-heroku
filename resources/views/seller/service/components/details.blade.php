<div class="col-12 mb-5">
    <div class="header app-shadow-3  text-center text-warning bolder font-25">
        @if(Request::route('id')===null)
            <a href="#" data-toggle="modal" data-target="#delete-service-{{$service->id}}"><i class="fas ml-2 text-danger fa-trash-alt"></i></a>
        @endif
        {{ $service->title }}
        @if(Request::route('id')===null)
            <a href="{{route( 'seller-service.edit' , $service->id)}}"><i class="fas mr-2 text-primary fa-pencil-alt"></i></a>
        @endif
    </div>
</div>
<div class="col-sm-6 col-12 mb-3">
    <div class="card h-100">
        <h5 class="mt-3 card-title text-center text-info bolder">الخدمة المقدمة</h5>
        <h5 class="card-title text-center text-info bolder">{{ $service->title }}</h5>
        <img src="{{ asset(isset($service->img) ? 'storage/'.$service->img: 'storage/basick/service.png')}}"
            class="card-img-top" alt={{$service->title}}>

        <div class=" mb-3 card-body">
            <div class="bolder text-info text-center mb-3"> السعر</div>
                <div class=" ml-2 text-danger text-center sellery ">
                    بعد الخصم {{  $service->salery * (100-$service->discount) /100  }}
                </div>
            <div class="text-center ml-2 discount text-danger sellery align-bottom">
                قبل الخصم {{  $service->salery}}
            </div>
        </div>
    </div>
</div>
<div class="col-sm-6 col-12 mb-3">
    <div class="card h-100">
        <h5 class="mt-3 card-title text-center text-info bolder">المنشئة مقدمة الخدمة</h5>
        <h5 class="card-title text-center text-info bolder">{{ $service->place->name }}</h5>
        <div class="row justify-content-center">
            <img
             src="{{ asset(isset($service->img) ? 'storage/'.$service->img: 'storage/basick/service.png')}}"
                class="card-img-top  col-6" alt={{$service->title}}>
            <div class="card-body col-12">
                {{ $service->excerpt }}
            </div>
        </div>
    </div>
</div>

<div class="col-12 mb-3">
    <div class="card">
        <div class="card-body">
            <h5 class="mb-3 card-title text-center text-info bolder">وصف الخدمة </h5>
            <p class="card-text  text-center"> <?php echo nl2br($service->content) ;?></p>
        </div>
    </div>
</div>

@if(isset($service->profile))
    <h5 class="text-center bolder text-warning mb-3 app-shadow-3"> بيانات مزود الخدمة </h5>
    <div class="col-12 mb-3">
        <div class="container card">
            <div class="row card-body justify-content-center">
                <div class="col-sm-2 ">
                    <img
                    width="100px" height="100px"
                    data-toggle="tooltip" data-placement="left"
                    class="profile-img-card" src="{{ asset(isset($service->profile->img) ? 'storage/'.$service->profile->img: 'storage/basick/profile.png')}}"/>
                </div>
                <div class="col-sm-4 mt-3">
                    <div class="d-flex flex-row bd-highlight ">
                        <div class="p-1 pl-2 app-w bolder text-dark">الأسم</div>
                        <div class="pb-1 pt-1 bolder text-secondary">{{ $service->user->name }}</div>
                    </div>
                    <div class="d-flex flex-row bd-highlight ">
                        <div class="p-1 pl-2 app-w bolder text-dark">المسمى الوظيفى</div>
                        <div class="pb-1 pt-1 bolder text-secondary">{{ $service->title }}</div>
                    </div>
                    <div class=" d-flex flex-row bd-highlight">
                        <div class="p-1 pl-2 app-w bolder text-dark">المهنة</div>
                        <div class="pb-1 pt-1 bolder text-secondary">{{ isset($service->profile->category) ? $service->profile->category->name : 'غير محدد' }}</div>
                    </div>
                    <div class="d-flex flex-row bd-highlight ">
                        <div class="p-1 pl-2 app-w bolder text-dark">التخصصات</div>
                        <div class="pb-1 pt-1 bolder text-secondary">{{ $service->profile->tags->pluck('name')->implode(',') }}</div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <h5 class=" mb-3 bolder text-info text-center">نبذ عن مقدم الخدمة</h5>
                    <div class="text-secondary text-center bolder">{{mb_substr(strip_tags($service->profile->content) ,0,100,'utf-8')}}</div>
                </div>
            </div>
        </div>
    </div>
@endif
<h5 class="text-center bolder text-warning mb-3 app-shadow-3"> بيانات المنشئة مقدمة الخدمة </h5>
<div class="col-12">
    <div class="container card">
        <div class="row card-body justify-content-center">
            <div class="col-sm-6 col-12 mt-3">
                <h5 class="text-center bolder text-info mb-3 "> مواعيد المنشئة </h5>
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-5 col-5">
                        <div class="bolder text-success"> الفتح  </div>
                        <div class="bolder text-danger"> الأغلاق   </div>
                        <div class="bolder text-danger">ألأجازات </div>
                    </div>
                    <div class="col-md-8 col-sm-7 col-7">
                        <div class="bolder text-secondary">{{ $service->place->openAt }}</div>
                        <div class="bolder text-secondary">{{ $service->place->closeAt }}</div>
                        <div class="bolder text-secondary">{{ ($service->place->daysClose === null )? 'مفتوح كل الأسبوع': $service->place->daysClose }}</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12 mt-3">
                <h5 class="text-center bolder text-info mb-3 ">  موقع المنشئة </h5>
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-5 col-5">
                        <div class="bolder text-dark">البلد</div>
                        <div class="bolder text-dark">المدينة</div>
                        <div class="bolder text-dark">الهاتف</div>
                        <div class="bolder text-dark">العنوان</div>
                    </div>
                    <div class="col-md-8 col-sm-7 col-7">
                        <div class="bolder text-secondary">{{ $service->place->country }}</div>
                        <div class="bolder text-secondary">{{ $service->place->city }}</div>
                        <div class="bolder text-secondary">{{ ($service->place->phone === null)? 'غير محدد': $service->place->phone}}</div>
                        <div class="bolder text-secondary">{{ $service->place->address }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if(Request::route('id')===null)
@include('seller.service.components.model')
    <form class="d-none" id="service-destoy-{{$service->id}}"
        action="{{ route( 'seller-service.destroy' , $service->id) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endif


