
    <fieldset class="app-card  mb-4">
{{-- $result = preg_replace("/[^a-zA-Z0-9]+/", "", $s); --}}
    <legend class="app-card-header"> رابط جديد</legend>
    <h5 class="text-center font-25 bolder text-warning app-shadow-3 mb-5">
        رابطك الجديد أضغط حفظ لحفظه أو قم بتعديلة
    </h5>
    @if(session()->has('error'))
        <div class="alert alert-danger bolder text-center">
            {{ session()->get('error') }}
        </div>
    @elseif(session()->has('success'))
        <div class="alert alert-success bolder text-center">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="alert alert-info text-center">
       {{ Request::root() }}/affiliate/{{ $affiliate_tag }}
    </div>
    <form method="POST"
     action="{{ route('marketing-affiliate.store') }}">
        @csrf
        @method('POST')
        <label for="tag" class="app-label"> الرابط </label>
        <input
         value="{{ old('tag',$affiliate_tag) }}"
         class="form-control mb-5 @error('tag') is-invalied @enderror"
          name="tag" type="text" id="tag"/>
        @error('tag')
            <div class="alert alert-danger mb-5">
                {{ $message }}
            </div>
        @enderror

        <label for="referral" class="app-label"> رابط الأحالة </label>
        <input
         value="{{ old('referral',Request::root()) }}"
         class="form-control mb-5 @error('referral')  is-invalied @enderror"
          name="referral" type="text" id="referral"/>
        @error('referral')
            <div class="alert alert-danger mb-5">
                {{ $message }}
            </div>
        @enderror
        <button class="btn btn-primary text-center mb-3 app-submit">
            حفظ الرابط
        </button>

    </form>
    </fieldset>

