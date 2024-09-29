@extends('auth.auth')
@section('content')

<div class="auth-left d-lg-block d-none">
    <div class="d-flex align-items-center flex-column h-100 justify-content-center">
        <img src="assets/images/auth/auth-img.png" alt="">
    </div>
</div>
<div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
    <div class="max-w-464-px mx-auto w-100">
        <div>
            <a href="{{ route('home') }}" class="mb-40 max-w-290-px">
                <h6>TO-DO APP</h6>
            </a>
            <h4 class="mb-12">Sign In to your Account</h4>
            <p class="mb-32 text-secondary-light text-lg">Welcome back! please enter your detail</p>
        </div>
        <livewire:auth.login />
    </div>
</div>

@endsection
