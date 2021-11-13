
<li class="list-group-item mt-3 text-break">
    <ul class="list-group list-group-horizontal">
    <li class="list-group-item w-100 p-2 app-list-child-c float-right text-right">
        <div class="bolder text-secondary">رابط الأحالة</div>
        <a href="{{ $affiliate->referral }}">
            <h5 class="bolder text-info mt-4 mr-4">{{ $affiliate->referral }}</h5>
        </a>
            <div class="bolder text-secondary">رابط التسويق</div>
            <h5 class="bolder text-info mr-4 mt-4"> {{ Request::root() }}/affiliate/{{ $affiliate->tag }}</h5>
            <div class="bolder text-secondary">صلاحية الرابط تنتهى فى </div>
            <h5 class="bolder text-info mr-4 mt-4">{{ $affiliate->expire_at }}</h5>
        <p>
            {{-- {{ $service->excerpt }} --}}
        </p>
        <div class="app-absolute-lt text-center m-3 ">
            <a class="d-inline app-un-decoration" href="{{ route("marketing-affiliate.create") }}">
            <div class="btn btn-primary btn-sm"> رابط جديد </div>
            </a>
            <form class="d-inline" action="{{ route("marketing-affiliate.destroy",$affiliate->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm"> حذف </button>
            </form>
        </div>
        <div class="app-absolute-lb m-3 ">
            <div class="bolder text-info text-center mb-3"> نسبتك عل كل عملية بيع</div>
            <div class=" ml-2 text-danger  text-center  ">
                1.5%
                {{-- نسبتك على كل عملية بيع {{  $affiliate->salery * (100-$affiliate->discount) /100   }} --}}
            </div>
        </div>
    </li>

    </ul>
</li>









