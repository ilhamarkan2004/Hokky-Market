<section class="bg-[#0D0D0D]">
    <header>
        <h2 class="text-lg font-medium text-slate-200">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-slate-200">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form enctype="multipart/form-data" id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form enctype="multipart/form-data" method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

          <div>
            <x-input-label for="photoprofile" class="text-slate-200" :value="__('Photo Profile')" />
            <x-text-input id="photoprofile" name="photoprofile" type="file" class="mt-1 block w-full  bg-transparent text-slate-200" :value="old('photoprofile', $user->photoprofile)" required autofocus autocomplete="photoprofile" />
            <x-input-error class="mt-2 text-red-600" :messages="$errors->get('photoprofile')" />
        </div>

        <div>
            <x-input-label for="name" class="text-slate-200" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full  bg-transparent text-slate-200" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-red-600" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" class="text-slate-200" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-transparent text-slate-200" :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2 text-red-600" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
