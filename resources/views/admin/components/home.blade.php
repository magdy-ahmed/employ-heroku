<div class="p-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('لوحة التحكم') }}</div>
                <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}

                    </div>
                @endif {{ __('مرحبا بك') }}
                </div>
            </div>
        </div>
    </div>
</div>
