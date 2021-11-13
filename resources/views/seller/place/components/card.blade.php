<div class="card  h-100 card-place">
  <div class="card-header bg-dark text-white bolder text-center">
    <a class="text-white " href="{{route('seller-place.show',$place->id)}}">{{$place->name}}</a>
  </div>
  <div>
{{-- <div class="app-tringal-right"></div> --}}


{{-- <div class="app-tringal"></div> --}}
  <img src="{{ asset(isset($place->img) ? 'storage/'.$place->img: 'storage/basick/place.png')}}"
  class="card-img-top" alt={{$place->name}}>
  </div>
  <div class="card-body">
    <p class="card-text ">{{$place->excerpt}}</p>
  </div>
    <div class="card-footer container bg-transparent text-center">
        <div class="row justify-content-center">
            <div class="col-6">
                <div><span class="bolder"> حــالة المـنشئة </span><span> </span></div>
                <div><span class="bolder"> عدد الخــدمات </span><span> </span></div>
                <div><span class="bolder"> عدد الطلبــات </span><span> </span></div>
            </div>
            <div class="col-6">
                <div><span class="bolder"> عدد الأعجـبات </span><span> </span></div>
                <div><span class="bolder"> عدد التقـيمات </span><span> </span></div>
                <div><span class="bolder"> عدد التعليقات </span><span> </span></div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between mt-3 mb-3 mr-2 ml-2">
        <a href="{{route('seller-service.create')}}">
            <button class="btn text-primary btn-dark btn-sm">
                أضف خدمة <i class="fas fa-plus-circle"></i>
            </button>
        </a>
        <a href="{{route('seller-place.show',$place->id)}}">
            <button class="btn text-white btn-dark btn-sm">
                عرض<i class="fas fa-eye"></i>
            </button>
        </a>
        <a class=" " href="{{route('seller-place.edit',$place->id)}}">
            <button class="btn text-success btn-dark btn-sm">
                تعديل<i class="fas fa-pencil-alt"></i>
            </button>
        </a>
        <form method="POST" class=" " action="{{route('seller-place.destroy',$place->id)}}">
            @csrf
            @method('DELETE')
            <button class="btn text-danger  btn-dark btn-sm">
            حذف<i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </div>
</div>


