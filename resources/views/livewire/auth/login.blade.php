<form wire:submit="login">
    <div class="icon-field mb-16">
        <span class="icon top-50 translate-middle-y">
            <iconify-icon icon="mage:email"></iconify-icon>
        </span>
        <input type="email" wire:model="email" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Email">
    </div>
    <div class="position-relative mb-20">
        <div class="icon-field">
            <span class="icon top-50 translate-middle-y">
                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
            </span>
            <input type="password" wire:model="password" class="form-control h-56-px bg-neutral-50 radius-12" id="your-password" placeholder="Password">
        </div>
        <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#your-password"></span>
    </div>

    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"> Login</button>

    <div class="mt-32 text-center text-sm">
        <p class="mb-0">Don’t have an account? <a href="{{ route('register') }}" class="text-primary-600 fw-semibold">Register</a></p>
    </div>

</form>
