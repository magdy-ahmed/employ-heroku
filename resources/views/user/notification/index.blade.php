@extends('admin.index')
@section('content')
<div class="notifications-home">
    <h2 class="text-center text-info bolder mb-5 app-shadow-3"> جميع أشعاراتك</h2>
    @if (session('success'))
        <div class="alert alert-info bolder text-center font-25">
            {{ session('success') }}
        </div>
    @endif
            <div class="card text-center m-2">
                @foreach ($notifications as $notification)
                    @if ($notification->type == 'welcome-role')
                        <span id="date" class="bolder tag approved text-success float-left">مرحبا بك</span>
                    @else
                        <span id="date" class="bolder tag app-progress text-success float-left">{{ $notification->timeAgo() }}</span>
                    @endif
                    <span class="text-primary bolder mt-3">{{$notification->name}}</span>
                    <div class="card-body text-secondary pt-3 text-center">
                        {{$notification->content}}
                    </div>
                    <hr/>
                @endforeach
                @if($notifications->lastPage() > 1)
                    <h6 class="text-primary bolder">تصفح السجل</h6>
                    <div class="d-flex justify-content-center">
                        {!! $notifications->links('pagination::bootstrap-4') !!}
                    </div>
                @endif

            </div>
        </div>
</div>

@endsection
@section('script')
    <script type="text/javascript">
    $(document).ready(function() {
        sendRequestReadNotfications(20);
    })
    </script>
@endsection
