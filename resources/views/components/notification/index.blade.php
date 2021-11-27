<div class="app-notification d-none bg-light" id="app-notification-page">
    <div class="container">
        <div class="row">
            <div class="content">
            @foreach (\App\Models\Notification::myNotification() as $notification)
               <div class="col-12 ">
                    @if ($notification->type == 'welcome-role')
                        <span id="date" class="bolder tag approved text-success float-left">مرحبا بك</span>

                    @else
                        <span id="date" class="bolder tag app-progress text-success float-left">{{ $notification->timeAgo() }}</span>

                    @endif
                    <h6 class="text-primary bolder mt-3">{{$notification->name}}</h6>
                    <div class="card-body text-secondary pt-3 text-center">
                        {{$notification->content}}
                    </div>
                    <hr/>
                </div>
            @endforeach
            </div>
            @if(\App\Models\Notification::myNotification()->isEmpty())
                <div class="col-12">
                    <div class="app-empty text-secondary">
                        لايوجد أشعارات حاليا
                    </div>
                </div>
            @endif
                <a class="text-center bolder text-primary footer bg-light" href="{{route('notification.index')}}">جميع الأشعارات</a>

        </div>
    </div>
</div>
