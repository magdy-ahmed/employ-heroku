<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title header-delete-user" id="exampleModalLongTitle">تسجيل الدخول<i class="far fa-question-circle"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <div class="header-delete-user"></div>
            <div class="body-delete-user text-center">
                 يجب تسجيل الدخول <br/>
                  لكى تتمكن من الأضافة الى المفضلة و القيام بمحادثات<br/>
                أنشأ حساب أو قم بتسجيل الدخول
            </div>
      </div>
      <div class="modal-footer">
        <a href="{{ route('register') }}">
            <button type="button" class="btn btn-primary">أنشاء حساب</button>
        </a>
        <a href="{{ route('login') }}">
            <button type="button" class="btn btn-success">تسجيل الدخول</button>
        </a>
      </div>
    </div>
  </div>
</div>
