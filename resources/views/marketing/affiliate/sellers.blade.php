@extends('marketing.index')
@section('content')

        <div class="">

            @if ($sellers->isNotEmpty())
                <div class="d-flex flex-row card-body">
                    <div class="text-center flex-grow-1">
                        <h4>أجمالى المدفوعات</h4>
                        <div class="price">150</div>
                    </div>
                    <div class="text-center flex-grow-1">
                        <h4>أجمالى ارباحى</h4>
                        <div class="price">25</div>
                    </div>
                    <div class="text-center flex-grow-1">
                        <h4>الحد الأقصى لعملاء</h4>
                        <div  class="username">10</div>
                    </div>
                </div>
                @foreach ($sellers as $user )
                    @include('marketing.affiliate.components.user')
                @endforeach

            @endif
            @if($sellers->isEmpty())
                <div class="app-empty text-secondary">
                    لم تقم بضم أحد الى فريقك عد لاحقا ...
                </div>
            @endif
        </div>

@endsection
