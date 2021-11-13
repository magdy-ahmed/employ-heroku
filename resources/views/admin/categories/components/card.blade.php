<div class="dropdown">
    <h3 id="header-catogry-routes"> أضافة وظيفة جديدة<br/><br/><br/></h3>
    <button class="btn w-100 btn-outline-dark dropdown-toggle mb-3" type="button" id="dropdownCategoriesAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        أختر الوظيفة للتعديل أو الحذف
    </button>
    <div class="dropdown-menu w-100 bg-secondary text-right" aria-labelledby="dropdownCategoriesAdmin">
        @foreach ( $categories as $category )
            <span class="dropdown-item w-100 text-right text-light category"
            onclick="changeHeaderCategory(event,{{$category->id}});
            ">{{$category->name}}</span>
        @endforeach
    </div>
    </div>
    <form id="form-edit-category"
        action="{{route('categories.update')}}" method="POST">
        @csrf
         @method('PUT')
        <div class="input-group mb-3">
            <input name="name" id="edit-category" type="text" class="form-control
            @if(Session::has('success-edit')) is-valid  @endif
             @error('name') is-invalied @enderror" placeholder="أختر الوظيفة أولا وقم بتعديلة" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-prepend">
            <input name="id" id="id-category" type="text" class="d-none">
                <button id="edit-category-button" disabled class="btn btn-outline-success disabled" type="submit">
                تعديل </button>
            </div>
        </div>
     </form>
    <form id="form-create-category"
        action="{{route('categories.store') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input name="name" type="text" class="form-control
            @if(Session::has('success-create')) is-valid  @endif
             @error('name') is-invalied @enderror" placeholder="أدخل أسم الوظيفة الجديد" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-prepend">
                <button class="btn btn-outline-primary" type="submit">
                    أضافة  </button>
            </div>
        </div>
    </form>


    @if(session()->has('success-create') )
        <div class="alert alert-success mt-3 text-right">
            {{session()->get('success-create')}}
        </div>
    @endif
    @if(session()->has('success-edit') )
        <div class="alert alert-success mt-3 text-right">
            {{session()->get('success-edit')}}
        </div>
    @endif
    @if($errors->isEmpty())
        <div class="alert alert-light mt-3 text-right">
            <br/>
        </div>
    @endif
    @error('name')
        <div class="alert alert-danger">
            {{$message}}
        </div>
    @enderror
    <form id="form-delete-category"
        action="{{route('categories.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
        <div  class="d-block w-80 text-center">
            <input name="id" id="id-category-" type="text" class="d-none">
            <button id="delete-category" disabled class=" btn btn-outline-danger disabled" type="submit">
                  حذف  </button></div>
    </form>

</div>


<script type="text/javascript">
    function changeHeaderCategory(event,id){
        document.getElementById('header-catogry-routes').innerHTML= 'أضافة جديد أو حذف أو تعديل <br/><br/><div class="text-primary"> وظيفة  :( '+event.target.innerHTML+" )</div>";
        document.getElementById('edit-category').value = event.target.innerHTML;
        document.getElementById('id-category').value = id;
        document.getElementById('id-category-').value = id;
        document.getElementById('edit-category-button').classList.remove('disabled');
        document.getElementById('delete-category').classList.remove('disabled');
        document.getElementById('edit-category-button').disabled = false;
        document.getElementById('delete-category').disabled = false;

    }

</script>

