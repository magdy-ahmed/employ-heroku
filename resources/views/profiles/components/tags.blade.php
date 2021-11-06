<div id='custom-simple-tags' data-simple-tags="{{isset($tags) ? ','.$tags :'' }}" class="simple-tags">
    <input id="input-tags" />
</div>
<input  id="tags-value" class="d-none" name="tags"/>

<script src="{{ asset('tags/simple-tags.min.js') }}"></script>
<script type="text/javascript">

    var element = document.querySelector('#custom-simple-tags');
        var observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                const val = document.getElementById('custom-simple-tags').getAttribute("data-simple-tags");
                const valI = document.getElementById('input-tags').value;
                const tags_value = document.getElementById('tags-value');
                let myData = "";
                if (mutation.type === "attributes") {
                    if(valI ==""){
                        myData = val;
                    }else{
                        myData = val+','+valI;
                    }
                    tags_value.value = myData;
                }
                });
        });

        observer.observe(element, {
             attributes: ['data-simple-tags']
     });
</script>

