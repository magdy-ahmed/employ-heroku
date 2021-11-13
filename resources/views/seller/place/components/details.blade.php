<div class="col-12 mb-5">
    <div class="header app-shadow-3  text-center text-warning bolder font-25">
        @if(Request::route('id')===null)
            <a href="#" data-toggle="modal" data-target="#delete-place-{{$place->id}}"><i class="fas ml-2 text-danger fa-trash-alt"></i></a>
        @endif
        {{ $place->name }}
        @if(Request::route('id')===null)
            <a href="{{route( 'seller-place.edit' , $place->id)}}"><i class="fas mr-2 text-primary fa-pencil-alt"></i></a>
        @endif
    </div>
</div>
<div class="col-sm-6 col-12 mb-5">
    <div class="card">
        <img src="{{ asset(isset($place->img) ? 'storage/'.$place->img: 'storage/basick/place.png')}}"
            class="card-img-top" alt={{$place->name}}>
    </div>
</div>
<div class="col-12">
    <h5 class="header app-shadow-3 mb-5 text-center text-warning bolder font-25">
        تفاصيل المنشئة
    </h5>
    <div class="container card">
        <div class="row card-body justify-content-center">
            <div class="col-sm-6 col-12 mt-3">
                <h5 class="text-center bolder text-info mb-3"> مواعيد العمل </h5>
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-5 col-5">
                        <div class="bolder text-success"> الفتح  </div>
                        <div class="bolder text-danger"> الأغلاق   </div>
                        <div class="bolder text-danger">ألأجازات </div>
                    </div>
                    <div class="col-md-8 col-sm-7 col-7">
                        <div class="bolder text-secondary">{{ $place->openAt }}</div>
                        <div class="bolder text-secondary">{{ $place->closeAt }}</div>
                        <div class="bolder text-secondary">{{ ($place->daysClose === null )? 'مفتوح كل الأسبوع': $place->daysClose }}</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-12 mt-3">
                <h5 class="text-center bolder text-info mb-3 "> الموقع </h5>
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-5 col-5">
                        <div class="bolder text-dark">البلد</div>
                        <div class="bolder text-dark">المدينة</div>
                        <div class="bolder text-dark">الهاتف</div>
                        <div class="bolder text-dark">العنوان</div>
                    </div>
                    <div class="col-md-8 col-sm-7 col-7">
                        <div class="bolder text-secondary">{{ $place->country }}</div>
                        <div class="bolder text-secondary">{{ $place->city }}</div>
                        <div class="bolder text-secondary">{{ ($place->phone === null)? 'غير محدد': $place->phone}}</div>
                        <div class="bolder text-secondary">{{ $place->address }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-5">
    <div class="card">
    <h5 class="text-center bolder text-info mb-3 mt-3"> الوصف </h5>

        <div class="card-body">
            <p class="card-text  text-center"> <?php echo nl2br($place->content) ;?></p>
        </div>
    </div>
</div>
@if(Request::route('id')===null)
@include('seller.place.components.model')
    <form class="d-none" id="place-destoy-{{$place->id}}"
        action="{{ route( 'seller-place.destroy' , $place->id) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endif
