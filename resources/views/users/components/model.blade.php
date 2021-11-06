<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="delete-user-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title header-delete-user" id="exampleModalLongTitle">تنبية<i class="fas fa-exclamation-triangle"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div class="header-delete-user"></div>
            <div class="body-delete-user">
                حذف ذلك المستخدم سيؤدى لحذف جميع منشوراتة وسجلاته . <br/>
                ولن تسطيع التراجع عن ذلك الأجراء بعد تنفيذة
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">تراجع</button>
        <button type="button" class="btn btn-success"
            onclick="event.preventDefault();
            document.getElementById('users-destroy-{{$id}}').submit();">تأكيد</button>
      </div>
    </div>
  </div>
</div>
