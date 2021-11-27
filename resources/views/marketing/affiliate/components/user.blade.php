<div class="container card mraketing-user mt-3 ">
    <div class="d-flex flex-row card-body">
        <div class="text-center flex-shrink">
            <img
            src="{{isset($user->profile->img) ? asset("storage/".$user->profile->img):asset("storage")."/basick/unprofile.png" }}"/>
        </div>

        <div class="text-center flex-grow-1">
            <h4>أسم المستخدم</h4>
            <div class="username">{{$user->name}}</div>
        </div>
        <div class="text-center flex-grow-1">
            <h4>أجمالى المدفوعات</h4>
            <div class="price">25</div>
        </div>
        <div class="text-center flex-grow-1">
            <h4>أجمالى أرباحى</h4>
            <div  class="price">25</div>
        </div>
    </div>
</div>
