
<li class="list-group-item  m-2 ">
<ul class="list-group app-list list-group-horizontal app-border-l">

  <li class="list-group-item app-list-child p-3"><img
  src="{{ asset(isset($service->img) ? 'storage/'.$service->img: 'storage/basick/service.png')}}"alt={{$service->name}}></li>
  <li class="list-group-item app-list-child-c w-100 p-3 float-right text-right">
    <a href="{{ route('seller-service.show',$service->id) }}">
        <h5 class="bolder text-info">{{ $service->title }}
            <a class ="mr-2"
             href="{{route( 'seller-service.edit' , $service->id)}}"><i class="fas mr-2 text-primary fa-pencil-alt"></i></a>
            <a href="#" class ="mr-3" data-toggle="modal" data-target="#delete-service-{{$service->id}}"
            {{-- class ="mr-3" onclick="event.preventDefault();
            document.getElementById('service-destroy-{{$service->id}}').submit();" --}}
            ><i class="fas text-danger fa-trash-alt"></i></a>

        </h5>
    </a>
    <p>
        {{ $service->excerpt }}
    </p>
    <div class="app-absolute-lb mb-3 ">
        <div class="bolder text-info text-center mb-3"> السعر</div>
        <div class=" ml-2 text-danger text-center sellery ">
        بعد الخصم {{  $service->salery * (100-$service->discount) /100   }}
        </div>
        <div class="text-center ml-2 discount text-danger sellery align-bottom">
           قبل الخصم {{  $service->salery}}
        </div>
    </div>
  </li>

</ul>
<form class="d-none" id="service-destroy-{{$service->id}}"
    action="{{ route( 'seller-service.destroy' , $service->id) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
@include('seller.service.components.model')
