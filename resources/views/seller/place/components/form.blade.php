<div class="app-card">
    @if (!$errors->isEmpty())
        <div class="alert alert-danger">
            جميع الحقول المسبوقة * ضرورية
        </div>
    @endif
    <form method="POST" autocomplete="off"  enctype="multipart/form-data"
     action="{{ isset($place) ? route('seller-place.update',$place->id) : route('seller-place.store') }}">
        @csrf
        @method('POST')
        @if(isset($place))
            @method('PUT')
        @endif
        <fieldset class="app-card  mb-4">

            <legend class="app-card-header">الأسم و الوصف  </legend>
            <div class="form-row align-items-center">
                <div class="col-6">
                    <label  for="name" class="app-label text-center"> * أسم المؤسسة</label>
                    <input name='name' id="name" type="text"
                    class="form-control mb-3 @error('name') is-invalied @enderror"
                    placeholder="اسم المؤسسة" aria-label="content" aria-describedby="basic-addon1"
                        value="{{(old('name', null) !== null) ? old('name') :(isset($place) ? $place->name : null)}}">
                    @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-6">
                    <label  for="phone" class="app-label text-center"> * رقم الهاتف</label>
                    <input name='phone' id="phone" type="number"
                    class="form-control mb-3 @error('phone') is-invalied @enderror"
                    placeholder="رقم الهاتف" aria-label="content" aria-describedby="basic-addon1"
                        value="{{(old('phone', null) !== null) ? old('phone') :(isset($place) ? $place->phone : null)}}">
                    @error('phone')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="content" class="app-label text-center"> * تفاصيل النشاط</label>
                    <textarea  rows="3" cols="80"
                    name='content' id="content" type="text"
                        class="form-control mb-3 @error('content') is-invalied @enderror"
                        placeholder="تفاصيل النشاط"
                        aria-label="تفاصيل النشاط" aria-describedby="تفاصيل النشاط" >{{(old('content', null) !== null) ? old('content') :(isset($place) ? $place->content : null)}}</textarea>
                    @error('content')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <label for="excerpt" class="app-label text-center"> * نبذة مختصرة للنشاط</label>
            <textarea  rows="2" cols="80"
                name='excerpt' id="excerpt" type="text"
                class="form-control mb-3 @error('excerpt') is-invalied @enderror"
                placeholder="نبذة مختصرة للنشاط"
                aria-label="نبذة مختصرة للنشاط" aria-describedby="نبذة مختصرة للنشاط" >{{(old('excerpt', null) !== null) ? old('excerpt') :(isset($place) ? $place->excerpt : null)}}</textarea>
            @error('excerpt')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
            <label for="img" class="app-label text-center">
                صورة للمؤسسة
            </label>
            <input value="{{(old('img', null) !== null) ? old('img') :(isset($place) ? $place->img : null)}}"
            type="file" class="app-input-file mb-3"
            accept="image/*" name='img'
            id="img" aria-describedby="img">
        </fieldset>


        <fieldset class="app-card  mb-4">
        <legend class="app-card-header">الموقع</legend>
            <div class="form-row align-items-center">

                <div class="col-sm-4 col-6">
                    <label for="country" class="app-label text-center"> * أختيار البلد</label>
                    <select name='country' id="country"
                        class="custom-select  mb-3 @error('country') is-invalied @enderror">
                        @if (isset($place))
                            @foreach ( Config::get('enums.countries') as $country )
                                <option {{ (old('country', null) !== null) ? ((old('country')== $country)?'selected':null):($country == $place->country ? 'selected':null) }}>{{$country}}</option>
                            @endforeach
                        @else
                            @foreach ( Config::get('enums.countries') as $country )
                                <option {{ (old('country', null) !== null) ? ((old('country')== $country)?'selected':null):null}}>{{$country}}</option>
                            @endforeach
                        @endif

                    </select>
                @error('country')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class="col-sm-4 col-6">
                    <label for="city" class="app-label text-center"> * المدينة </label>
                    <input name='city' id="city" type="text"
                        class="form-control  mb-3 @error('city') is-invalied @enderror"
                         placeholder="المدينة"
                        aria-label="المدينة" aria-describedby="المدينة"
                        value="{{ (old('city', null) !== null) ? old('city') :(isset($place) ? $place->city : null)}}">
                @error('city')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class="col-sm-4 col-12">
                    <label for="location" class="app-label text-center">الموقع الجغرافى</label>
                    <input name='location' id='location' type="text" disabled
                        class="form-control mb-3" placeholder="الموقع الجغرافى"
                        {{ isset($place) ? $place->location : null}}
                        aria-label="الموقع الجغرافى" aria-describedby="الموقع الجغرافى">
                </div>
                <div class="col-12">
                    <label for="address" class="app-label text-center"> * وصف العنوان</label>
                    <textarea  rows="2" cols="80"
                        name='address' id="address" type="text"
                        class="form-control  mb-3 @error('address') is-invalied @enderror"
                         placeholder="وصف العنوان">{{(old('address', null) !== null) ? old('address') : (isset($place) ? $place->address : null)}}</textarea>
                @error('address')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>
            </div>
        </fieldset>
        <fieldset class="app-card  mb-4">
            <legend class="app-card-header">أوقات العمل</legend>
            <div class="form-row align-items-center">
                <div class="col-6">
                    <label for="openAt" class="app-label text-center"> * وقت الفتح</label>
                    <input name='openAt' id="openAt" type="time"
                        class="custom-select  mb-3 @error('openAt') is-invalied @enderror"
                        aria-label="وقت الفتح" aria-describedby="وقت الفتح"
                        value="{{(old('openAt', null) !== null) ? old('openAt') :(isset($place) ? $place->openAt : null)}}" />
                @error('openAt')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class=" col-6">
                    <label for="closeAt" class="app-label text-center"> * وقت الأغلاق</label>
                    <input name='closeAt' id="closeAt" type="time"
                        class="custom-select  mb-3 @error('closeAt') is-invalied @enderror"
                        aria-label="وقت الأغلاق" aria-describedby="وقت الأغلاق"
                        value="{{(old('closeAt', null) !== null) ? old('closeAt') :(isset($place) ? $place->closeAt : null)}}" />
                @error('closeAt')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class="col-12">
                    <label for="daysClose" class="app-label text-center">الأجازات الأسبوعية</label>
                    <select  name='daysClose[]' class="custom-select  mb-3" id="daysClose" multiple>
                        @if (old('daysClose', null) !== null)
                            @foreach (Config::get('enums.weekDays') as $day)
                            @if (in_array($day, old('daysClose')))
                                <option selected value="{{$day}}">{{$day}}</option>
                            @else
                                <option value="{{$day}}">{{$day}}</option>

                            @endif
                            @endforeach
                        @elseif (isset($place))
                            @foreach (Config::get('enums.weekDays') as $day)
                            @if (in_array($day, $place->daysClose))
                                <option selected value="{{$day}}">{{$day}}</option>
                            @else
                                <option value="{{$day}}">{{$day}}</option>

                            @endif
                            @endforeach
                        @else
                            @foreach (Config::get('enums.weekDays') as $day)
                                <option value="{{$day}}">{{$day}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>


        </fieldset>
        <fieldset class="app-card  mb-4">
            <legend class="app-card-header ">  الحالة</legend>
            <div class="">
                <label for="status" class="app-label text-center"> * حالة المنشور</label>
                <select name='status' class="custom-select mb-3 @error('status') is-invalied @enderror"
                    id="status">
                    @if (isset($place))
                        <option value="true" {{ (old('status', null) !== null) ? ((old('status')== 'true')?'selected':null):($place->status =='true'? 'selected':null )}}>النشر</option>
                        <option value="false" {{  (old('status', null) !== null) ? ((old('status')== 'false')?'selected':null):($place->status =='false'? 'selected':null) }}>حفظ (للنشر لاحقا)</option>
                    @else
                        <option value="true" {{(old('status', null) !== null) ? ((old('status')== 'true')?'selected':null):'selected' }}>النشر</option>
                        <option value="false" {{(old('status', null) !== null) ? ((old('status')== 'false')?'selected':null):null }} >حفظ (للنشر لاحقا)</option>
                    @endif
                </select>
                @error('status')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

        </fieldset>
        @if (isset($place))
            <button class="btn btn-success text-center mb-3 app-submit">
                تعديل المنشئة
            </button>
        @else
            <button class="btn btn-primary text-center mb-3 app-submit">
                اضافة منشئة
            </button>
        @endif

    </form>
</div>
