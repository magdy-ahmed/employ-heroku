// 1 on attr change
var element = document.querySelector('#test');
setTimeout(function() {
  element.setAttribute('data-text', 'whatever');
}, 5000)

var observer = new MutationObserver(function(mutations) {
  mutations.forEach(function(mutation) {
    if (mutation.type === "attributes") {
      console.log("attributes changed")
    }
  });
});

observer.observe(element, {
  attributes: true //configure it to listen to attribute changes
});

// 1 on attr change for tags componnent
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
// 2  remove option by value
var selectobject = document.getElementById("mySelect");
for (var i=0; i<selectobject.length; i++) {
    if (selectobject.options[i].value == 'A')
        selectobject.remove(i);
}


    jQuery(document).ready(function(){
       jQuery('#ajaxSubmit').click(function(e){
          e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }
         });
           jQuery.ajax({
             url: "{{ url('/services-favorite/') }}"+1,
             method: 'post',
             data: {
//                   name: jQuery('#name').val(),
//                     type: jQuery('#type').val(),
//                 price: jQuery('#price').val()
             },
             success: function(result){
                console.log(result);
             }});
          });
       });
       parseInt(document.getElementById('jj').value)
       function maxLengthCheck(object)
       {
           if (object.value > object.maxLength)
           object.value = object.value.slice(0, object.maxLength)
       }
