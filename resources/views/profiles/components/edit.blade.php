@section('style')
    <link href="{{ asset('tags/simple-tags.min.css') }}" rel="stylesheet">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
</script>
@endsection
<div class="app-header">
 تعديل الملف الشخصى
</div>

<form method="POST" autocomplete="off"  enctype="multipart/form-data" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')
    <label for="summary-ckeditor" class="app-label">
        الصفحة الشخصية
    </label>
    <textarea name="content" id="summary-ckeditor" rows="10" cols="80">
        @if (isset($profile->content))
             {{ $profile->content }}
        @endif
    </textarea>

    <label for="img" class="app-label">
        صورة شخصية
    </label>
    <input value="{{isset($profile->img) ? $profile->img : null}}" type="file" class="app-input-file mb-3"   accept="image/*" name='img'  id="img" aria-describedby="img">
    <label for="input-tags" class="app-label">
        أدخل التخصص او عدة تخصصات
        <span>( لأكثر من تخصص أدخل , )</span>
    </label>
    @include('profiles.components.tags')
    <label for="category" class="app-label">
        الوظيفة
    </label>
    <select name="category" class="custom-select mb-3" >
        @if (isset($profile->category))
            <option selected>{{$profile->category->name}}</option>
        @endif
        @if (isset($categories))
            @foreach ( $categories as $category )
                {{-- @if ($category->id !=$profile->category->id) --}}
                    <option value="{{$category->id}}">{{$category->name}}</option>
                {{-- @endif --}}

            @endforeach
        @endif

    </select>
    <label for="category" class="app-label">
        المسمى الوظيفى
    </label>
      <input name="title" value="{{isset($profile->title) ? $profile->title : ''}}" name="category" type="text" class="form-control mb-3" placeholder="المسمى الوظيفى" aria-label="المسمى الوظيفى" aria-describedby="المسمى الوظيفى">
        <div class="text-center">
            <button  type="submit" class="btn btn-outline-secondary submit  btn-lg">تعديل</button>
        </div>
</form>
<script>
    var id = 'summary-ckeditor'
    CKEDITOR.replace( id, {
        customConfig: 'custom_config.js'
    });
  // document.getElementById("img").value = "لم تقم بتعيين صورة";
</script>

