@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('تأكد من بريدك الالكتروني') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('تم إرسال عملية التأكد إلى بريدك الالكتروني') }}
                        </div>
                    @endif

                    {{ __('قبل أن تواصل, تأكد في بريدك الالكتروني من العملية') }}
                    {{ __('إذا لم تتلق أي شيء') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('اضغط هنا من أجل التأكد مرة أخرى') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
