<div class="modal fade" id="chat-service-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title header-delete-user" id="exampleModalLongTitle">أترك رسالتك لمقدم الخدمة<i class="fas fa-comment mr-2 text-info"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div class="header-delete-user"></div>
            <textarea id="message-model" class="form-control"
                oninput="">
            </textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">أغلاق</button>
        <button type="button" class="btn btn-primary"
            onclick="event.preventDefault();
            document.getElementById('message-form').value = document.getElementById('message-model').value;
            document.getElementById('sendChatForm').submit();">أرسال</button>
      </div>
    </div>
  </div>
</div>
