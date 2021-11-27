@extends('layouts.app')
@section('content')
    <div class="p-5">
        <div class="row justify-content-center " id="cards">
            @if(session('success'))
                <div class="col-12 p-2">
                    <div class="alert alert-success text-center bolder">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            @if(session('route'))
                <div class="col-12 p-2">
                    <div class="alert alert-info text-center bolder">
                        <a href="{{ session('route') }}">يمكنك متابعة محادثتك من هنا</a>
                    </div>

                </div>
            @endif
            @if (isset($services))
                @foreach ( $services as  $service)

                    @include("user.services.components.item")
                @endforeach
                <div class="mt-4 d-flex justify-content-center">
                    {!! $services->links('pagination::bootstrap-4') !!}
                </div>
                @include('user.services.components.modal')
            @elseif (isset($favorites))
                @foreach ( $favorites as  $service)
                    @include("user.services.components.item")
                @endforeach
                <div class="mt-4 d-flex justify-content-center">
                    {!! $favorites->links('pagination::bootstrap-4') !!}
                </div>
            @endif
        </div>
    </div>
    <form method="POST" id="sendChatForm" class=" d-none" action="/" method="POST">
        @csrf
        <input name="message" id="message-form"/>
        <button class="btn text-danger  btn-dark btn-sm">
        حذف<i class="fas fa-trash-alt"></i>
        </button>
    </form>
    @include('user.services.components.modalChat')
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/script.js') }}" ></script>
    <script type="text/javascript" >
        function changeAction(id){
            document.getElementById('sendChatForm').action = window.location.origin+"/send-message/"+id;
        }
    </script>
@endsection
@section('style')

@endsection
