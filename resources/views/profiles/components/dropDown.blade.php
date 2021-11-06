<div class="input-group mb-3">
  <input id='category-input' disabled type="text" class="form-control" aria-label="Text input with dropdown button">
  <div class="input-group-prepend">
    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">أختر القسم</button>
    <div class="dropdown-menu  w-100 bg-secondary text-right">
        @foreach ( $categories as $category)
        <span
            style="cursor: pointer;"
         onclick="changeHeaderCategory(event,{{$category->id}});"
         class="dropdown-item w-100 text-right text-light category">{{ $category->name }}</span>
        @endforeach
    </div>
  </div>
  <input id='category-id' disabled class='d-none' type="text">
</div>
<script type="text/javascript">
function changeHeaderCategory(event,id){
    document.getElementById('category-input').value = event.target.innerHTML;
    document.getElementById('category-id').value = id;

}

</script>
