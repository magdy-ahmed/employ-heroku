@extends('layouts.app')
@section('navbar')
    @include('layouts.components.navbarAdmin')
@endsection

@section('content')
    <h1 class="text-center bolder text-info mb-4">الأعدادت الرئيسية للموقع</h1>
    <form action="{{ route('admin.setting.update') }}" method="post">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row justify-content-center">
                @foreach ( $setting as $key => $value )
                <div class="col-12 ">
                    <div class="collapse" id="{{$key}}_">
                        <div class="card card-body text-right bolder text-success">
                            {{$value['desc']}}
                        </div>
                    </div>
                </div>
                @endforeach
                @if ($errors->isNotEmpty())
                    <div class="col-12 p-2" >
                        <div class="alert alert-danger bolder text-center font-25">
                            {{$message}}
                        </div>
                    </div>
                @endif
                @if (session('success'))
                    <div class="col-12 p-2" >
                        <div class="alert alert-info bolder text-center font-25">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <div class="col-12 p-2 d-none" id="error-input">
                    <div id="error-message" class="alert alert-danger bolder text-center font-25">

                    </div>
                </div>
                <div class="col-sm-6 col-12 p-2">
                    <label for="special-ads-days" class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#special-ads-days_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        مدة الأعلان المميز بالأيام</label>
                    <input name="special-ads-days" id="special-ads-days"
                    value="{{$setting['special-ads-days']['element']}}"
                    type="number" class="form-control"
                    min="1" max="1000"
                    oninput="maxLengthCheck(this)"/>
                </div>

                <div class="col-sm-6 col-12 p-2">
                    <label for="special-ads-amount"  class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#special-ads-amount_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        السعر للأعلان المميز</label>
                    <input name="special-ads-amount" id="special-ads-amount"
                    value="{{$setting['special-ads-amount']['element']}}"
                    type="number" class="form-control"
                    min="0" max="10000"
                    oninput="maxLengthCheck(this)"/>
                </div>

                <div class="col-sm-6 col-12 p-2">
                    <label for="renewAuto-ads-days" class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#renewAuto-ads-days_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        مدة أعلان يجدد تلقائى بالأيام</label>
                    <input name="renewAuto-ads-days" id="renewAuto-ads-days"
                    value="{{$setting['renewAuto-ads-days']['element']}}"
                    type="number" class="form-control"
                    min="1" max="1000"
                    oninput="maxLengthCheck(this)"/>
                </div>

                <div class="col-sm-6 col-12 p-2">
                    <label for="renewAuto-ads-amount"  class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#renewAuto-ads-amount_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        السعر للأعلان يجدد  تلقائى</label>
                    <input name="renewAuto-ads-amount" id="renewAuto-ads-amount"
                    value="{{$setting['renewAuto-ads-amount']['element']}}"
                    type="number" class="form-control"
                    min="0" max="10000"
                    oninput="maxLengthCheck(this)"/>
                </div>

                <div class="col-sm-6 col-12 p-2">
                    <label for="renewAuto-ads-hours" class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#renewAuto-ads-hours_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                    عدد السعات لأعلان يجدد تلقائى</label>
                    <input name="renewAuto-ads-hours" id="renewAuto-ads-hours"
                    value="{{$setting['renewAuto-ads-hours']['element']}}"
                    type="number" class="form-control"
                    min="1" max="1000"
                    oninput="maxLengthCheck(this)"/>
                </div>

                <div class="col-sm-6 col-12 p-2">
                    <label for="affiliate-expire"  class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#affiliate-expire_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        عدد أيام صلاحية روابط التسويق</label>
                    <input name="affiliate-expire" id="affiliate-expire"
                    value="{{$setting['affiliate-expire']['element']}}"
                    type="number" class="form-control"
                    min="1" max="10000"
                    oninput="maxLengthCheck(this)"/>
                </div>

                <div class="col-sm-6 col-12 p-2">
                    <label for="afilite-count-users" class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#afilite-count-users_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        الحد الأقصى للفريق التسويقى
                    </label>
                    <input name="afilite-count-users" id="afilite-count-users"
                    value="{{$setting['afilite-count-users']['element']}}"
                    type="number" class="form-control"
                    min="1" max="1000"
                    oninput="maxLengthCheck(this)"/>
                </div>

                <div class="col-sm-6 col-12 p-2">
                    <label for="afilite-remove-user"  class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#afilite-remove-user_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        تمكين الحذف للفريق التسويقى</label>
                    <select name="afilite-remove-user" id="afilite-remove-user"
                    class="custom-select">
                        <option value="0" {{ ($setting['afilite-remove-user']['element'] =='0') ? 'selected' : null }}> حذر الحذف</option>
                        <option value="1" {{ ($setting['afilite-remove-user']['element'] =='1') ? 'selected' : null }}> تمكين الحذف</option>
                    </select>
                </div>
                <div class="col-sm-6 col-12 p-2">
                    <label for="afilite-amount-1" class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#afilite-amount-1_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        مقدار أرباح الباقة الأولى</label>
                    <input name="afilite-amount-1" id="afilite-amount-1"
                    value="{{$setting['afilite-amount-1']['element']}}"
                    type="number" class="form-control"
                    min="1" max="1000000"
                    oninput="maxLengthCheck(this)"/>
                </div>

                <div class="col-sm-6 col-12 p-2">
                    <label for="afilite-amount-2"  class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#afilite-amount-2_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        مقدار أرباح الباقة الثانية</label>
                    <input name="afilite-amount-2" id="afilite-amount-2"
                    value="{{$setting['afilite-amount-2']['element']}}"
                    type="number" class="form-control"
                    min="1" max="1000000"
                    oninput="maxLengthCheck(this)"/>
                </div>

                <div class="col-sm-6 col-12 p-2">
                    <label for="afilite-amount-3" class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#afilite-amount-3_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        مقدار أرباح الباقة الثالثة</label>
                    <input name="afilite-amount-3" id="afilite-amount-3"
                    value="{{$setting['afilite-amount-3']['element']}}"
                    type="number" class="form-control"
                    min="1" max="1000000"
                    oninput="maxLengthCheck(this)"/>
                </div>

                <div class="col-sm-6 col-12 p-2">
                    <label for="afilite-rate-1"  class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#afilite-rate-1_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                    نسبة أرباح الباقة الأولى</label>
                    <input name="afilite-rate-1" id="afilite-rate-1"
                    value="{{$setting['afilite-rate-1']['element']}}"
                    type="number" class="form-control"
                    min="0" max="100"
                    oninput="maxLengthCheck(this)"/>
                </div>

                <div class="col-sm-6 col-12 p-2">
                    <label for="afilite-rate-2" class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#afilite-rate-2_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        نسبة أرباح الباقة الثانية</label>
                    <input name="afilite-rate-2" id="afilite-rate-2"
                    value="{{$setting['afilite-rate-2']['element']}}"
                    type="number" class="form-control"
                    min="0" max="100"
                    oninput="maxLengthCheck(this)"/>
                </div>

                <div class="col-sm-6 col-12 p-2">
                    <label for="afilite-rate-3"  class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#afilite-rate-3_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        نسبة أرباح الباقة الثالثة</label>
                    <input name="afilite-rate-3" id="afilite-rate-3"
                    value="{{$setting['afilite-rate-3']['element']}}"
                    type="number" class="form-control"
                    min="0" max="100"
                    oninput="maxLengthCheck(this)"/>
                </div>
                <div class="col-sm-6 col-12 p-2">
                    <label for="afilite-rate-4"  class="app-label">
                    <a href="#"><i class="fas fa-info-circle text-primary" data-toggle="collapse" data-target="#afilite-rate-4_" aria-expanded="false" aria-controls="collapseExample"></i></a>
                        نسبة أرباح الباقة الرابعة</label>
                    <input name="afilite-rate-4" id="afilite-rate-4"
                    value="{{$setting['afilite-rate-4']['element']}}"
                    type="number" class="form-control"
                    min="0" max="100"
                    oninput="maxLengthCheck(this)"/>
                </div>
                <div class="col-12 p-2">
                    <div class="text-center">
                        <button class="btn btn-success btn-lg"> تعديل</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script type="text/javascript">
        function maxLengthCheck(object)
        {
            document.getElementById('error-input').classList.add('d-none');
            if ( parseInt(object.value) > object.max){
                object.value = object.max;
                document.getElementById('error-input').classList.remove('d-none');
                document.getElementById('error-message').innerHTML = object.max+" الحد الأقصى للأدخال ";
            }
            else if(parseInt(object.value) < object.min){
                object.value = object.min;
                document.getElementById('error-input').classList.remove('d-none');
                document.getElementById('error-message').innerHTML = object.min+" الحد الأدنى للأدخال ";
            }
        }
    </script>
@endsection


