<div class="app-card">
    @if (!$errors->isEmpty())
        <div class="alert alert-danger">
            جميع الحقول المسبوقة * ضرورية
        </div>
    @endif
    <form method="POST" autocomplete="off"  enctype="multipart/form-data"
     action="{{ isset($service) ? route('seller-service.update',$service->id) : route('seller-service.store') }}">
        @csrf
        @method('POST')
        @if(isset($service))
            @method('PUT')
        @endif
        <fieldset class="app-card  mb-4">

            <legend class="app-card-header"> وصف الخدمة</legend>
            <div class="form-row align-items-center">
                <div class="col-6">
                    <label  for="title" class="app-label text-center"> * عنوان الخدمة</label>
                    <input name='title' id="title" type="text"
                    class="form-control mb-3 @error('title') is-invalied @enderror"
                    placeholder="اسم المؤسسة" aria-label="content" aria-describedby="basic-addon1"
                        value="{{(old('title', null) !== null) ? old('title') :(isset($service) ? $service->title : null)}}">
                    @error('title')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                <label for="img" class="app-label text-center">
                    صورة للخدمة
                </label>
                <input value="{{(old('img', null) !== null) ? old('img') :(isset($service) ? $service->img : null)}}"
                type="file" class="app-input-file mb-3"
                accept="image/*" name='img'
                id="img" aria-describedby="img">

                </div>
                <div class="col-12">
                    <label for="content" class="app-label text-center"> * تفاصيل الخدمة</label>
                    <textarea  rows="3" cols="80"
                    name='content' id="content" type="text"
                        class="form-control mb-3 @error('content') is-invalied @enderror"
                        placeholder="تفاصيل الخدمة"
                        aria-label="تفاصيل الخدمة"
                        aria-describedby="تفاصيل الخدمة" >{{(old('content', null) !== null) ? old('content') :(isset($service) ? $service->content : null)}}</textarea>
                @error('content')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <label for="excerpt" class="app-label text-center"> * نبذة مختصرة للخدمة</label>
                <textarea  rows="3" cols="80"
                    name='excerpt' id="excerpt" type="text"
                    class="form-control mb-3 @error('excerpt') is-invalied @enderror"
                    placeholder="نبذة مختصرة للخدمة"
                    aria-label="نبذة مختصرة للخدمة"
                    aria-describedby="نبذة مختصرة للخدمة" >{{(old('excerpt', null) !== null) ? old('excerpt') :(isset($service) ? $service->excerpt : null)}}</textarea>
                @error('excerpt')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </fieldset>


        <fieldset class="app-card  mb-4">
            <legend class="app-card-header">المنشئة</legend>
            @if(count($places)!==0)
            <label  for="place" class="app-label text-center"> * المنشئة مقدمة الخدمة</label>
                <select name='place' class="custom-select mb-3 @error('place') is-invalied @enderror"
                    id="place">
                    @foreach ( $places as $place )
                        <option value="{{ $place->id }}" {{ (old('place', null) !== null) ? ((old('status')==$place->id)?'selected':null) :((isset($servic))?($service->place->id ==$place->id? 'selected':null ):null)}}>{{ $place->name }}</option>
                    @endforeach
                </select>
            @endif
        </fieldset>
        <fieldset class="app-card  mb-4">
            <legend class="app-card-header" >سعر الخدمة</legend>
            <div class="form-row align-items-center">
                <div class="col-6">
                    <label for="salery" class="app-label text-center"> * سعر الخدمة بالمصرى</label>
                    <input name='salery' id="salery" type="number"
                        class="custom-select  mb-3 @error('salery') is-invalied @enderror"
                        aria-label="سعر الخدمة" aria-describedby="سعر الخدمة"
                        value="{{(old('salery', null) !== null) ? old('salery') :(isset($service) ? $service->salery : null)}}" />
                @error('salery')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class=" col-6">
                    <label for="discount" class="app-label text-center"> <span class='font-bolder font-25' id='discountLabel'></span> نسبة الخصم</label>
                    <input name='discount' id="discount" type="range"
                        class="form-control-range  mb-3 @error('discount') is-invalied @enderror"
                        min="1" max="100"
                        value="{{(old('discount', null) !== null) ? old('discount') :(isset($service) ? $service->discount : 0)}}"
                        onchange="dicountEvent(event);"/>
                @error('discount')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>
            </div>


        </fieldset>
        <fieldset class="app-card  mb-4">
            <legend class="app-card-header ">  الحالة</legend>
            <div class="">
                <label  for="status" class="app-label text-center"> * حالة المنشور</label>
                <select name='status' class="custom-select mb-3 @error('closeAt') is-invalied @enderror"
                    id="status">
                    @if (isset($service))
                        <option value="true" {{ (old('status', null) !== null) ? ((old('status')=='true')?'selected':null) :($service->status =='true'? 'selected':null )}}>النشر</option>
                        <option value="false" {{ (old('status', null) !== null) ? ((old('status')=='false')?'selected':null) :( $service->status =='false'? 'selected':null) }}>حفظ (للنشر لاحقا)</option>
                    @else
                        <option value="true" {{ (old('status', null) !== null) ? ((old('status')=='false')?'selected':null):'selected' }}>النشر</option>
                        <option value="false" {{ (old('status', null) !== null) ? ((old('status')=='false')?'selected':null):null  }}>حفظ (للنشر لاحقا)</option>
                    @endif
                </select>
                @error('status')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

        </fieldset>
        @if (isset($service))
            <button class="btn btn-success text-center mb-3 app-submit">
                تعديل الخدمة
            </button>
        @else
            <button class="btn btn-primary text-center mb-3 app-submit">
                اضافة خدمة
            </button>
        @endif

    </form>
</div>
<script type="text/javascript">
function dicountEvent(event){
    const discElement = document.getElementById('discountLabel');
    discElement.innerHTML = "%"+ event.target.value;
}
</script>
