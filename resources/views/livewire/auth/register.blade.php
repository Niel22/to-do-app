<form wire:submit="register">
    <div class="icon-field mb-16">
        <span class="icon top-50 translate-middle-y">
            <iconify-icon icon="f7:person"></iconify-icon>
        </span>
        <input type="text" wire:model="name" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Username">
        @error('name')
        <span class="text-sm text-danger">{{ $message }}</span>
        @enderror

    </div>
    <div class="icon-field mb-16">
        <span class="icon top-50 translate-middle-y">
            <iconify-icon icon="mage:email"></iconify-icon>
        </span>
        <input type="email" wire:model="email" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Email">
        @error('email')
        <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-20">
        <div class="position-relative ">
            <div class="icon-field">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                </span>
                <input type="password" wire:model="password" class="form-control h-56-px bg-neutral-50 radius-12" id="your-password" placeholder="Password">
            </div>
            <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#your-password"></span>
        </div>
        <span class="mt-12 text-sm text-secondary-light">Your password must have at least 8 characters</span>
        @error('password')
        <span class="text-sm text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-20">
        <div class="position-relative ">
            <div class="icon-field">
                <span class="icon top-50 translate-middle-y">
                    <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                </span>
                <input type="password" wire:model="password_confirmation" class="form-control h-56-px bg-neutral-50 radius-12" id="your-confirm-password" placeholder="Confirm Password">
            </div>
            <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#your-confirm-password"></span>
        </div>
    </div>

    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"> Register</button>
    <div class="mt-32 text-center text-sm">
        <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="text-primary-600 fw-semibold">Login</a></p>
    </div>

</form>
