<x-action-section>
    <x-slot name="title">
        {{ __('Dvojfaktorová autentifikácia') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Pridajte dodatočnú bezpečnosť vášmu účtu použitím dvojfaktorovej autentifikácie.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('Dokončite povolenie dvojfaktorovej autentifikácie.') }}
                @else
                    {{ __('Povolili ste dvojfaktorovú autentifikáciu.') }}
                @endif
            @else
                {{ __('Nepovolili ste dvojfaktorovú autentifikáciu.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                {{ __('Keď je povolená dvojfaktorová autentifikácia, počas prihlásenia budete vyzvaní k zadaniu bezpečného, náhodného tokenu. Tento token môžete získať z aplikácie Google Authenticator vo svojom telefóne.') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('Pre dokončenie povolenia dvojfaktorovej autentifikácie naskenujte nasledujúci QR kód pomocou aplikácie na autentifikáciu vo vašom telefóne alebo zadajte nastavený kľúč a vygenerujte OTP kód.') }}
                        @else
                            {{ __('Dvojfaktorová autentifikácia je teraz povolená. Naskenujte nasledujúci QR kód pomocou aplikácie na autentifikáciu vo vašom telefóne alebo zadajte nastavený kľúč.') }}
                        @endif
                    </p>
                </div>

                <div class="mt-4 p-2 inline-block bg-white">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Nastavený kľúč') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-label for="code" value="{{ __('Kód') }}" />

                        <x-input id="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                                 wire:model="code"
                                 wire:keydown.enter="confirmTwoFactorAuthentication" />

                        <x-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Uložte si tieto obnovovacie kódy do svojho bezpečného správcu hesiel. Môžu byť použité na obnovenie prístupu k vášmu účtu, ak váš zariadenie na dvojfaktorovú autentifikáciu bude stratené.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-button type="button" wire:loading.attr="disabled">
                        {{ __('Povoliť') }}
                    </x-button>
                </x-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-secondary-button class="me-3">
                            {{ __('Obnoviť obnovovacie kódy') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @elseif ($showingConfirmation)
                    <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <x-button type="button" class="me-3" wire:loading.attr="disabled">
                            {{ __('Potvrdiť') }}
                        </x-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="showRecoveryCodes">
                        <x-secondary-button class="me-3">
                            {{ __('Zobraziť obnovovacie kódy') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-secondary-button wire:loading.attr="disabled">
                            {{ __('Zrušiť') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-danger-button wire:loading.attr="disabled">
                            {{ __('Zakázať') }}
                        </x-danger-button>
                    </x-confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-action-section>
