<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        {{-- Current Password --}}
        <div class="col-span-6 sm:col-span-4 relative">
            <x-label for="current_password" value="{{ __('Current Password') }}" />
            <x-input id="current_password" type="password" class="mt-1 block w-full pr-10"
                wire:model.defer="state.current_password" autocomplete="current-password" />
            <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer text-gray-400"
                onclick="togglePassword('current_password', this)">
                <i class="bi bi-eye"></i>
            </span>
            <x-input-error for="current_password" class="mt-2" />
        </div>

        {{-- New Password --}}
        <div class="col-span-6 sm:col-span-4 relative">
            <x-label for="password" value="{{ __('New Password') }}" />
            <x-input
                id="password"
                type="password"
                class="mt-1 block w-full pr-10"
                wire:model.defer="state.password"
                autocomplete="new-password" />
            <span
                class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer text-gray-400"
                onclick="togglePassword('password', this)">
                <i class="bi bi-eye"></i>
            </span>
            <x-input-error for="password" class="mt-2" />
        </div>

        {{-- Confirm Password --}}
        <div class="col-span-6 sm:col-span-4 relative">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-input
                id="password_confirmation"
                type="password"
                class="mt-1 block w-full pr-10"
                wire:model.defer="state.password_confirmation"
                autocomplete="new-password" />
            <span
                class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer text-gray-400"
                onclick="togglePassword('password_confirmation', this)">
                <i class="bi bi-eye"></i>
            </span>
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>

<script>
  function togglePassword(fieldId, iconSpan) {
    const input = document.getElementById(fieldId);
    const icon  = iconSpan.querySelector('i');

    if (input.type === 'password') {
      input.type = 'text';
      icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
      input.type = 'password';
      icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
  }
</script>
