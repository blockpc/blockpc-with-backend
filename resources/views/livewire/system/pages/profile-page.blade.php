<div>
    <form wire:submit.prevent="save">
        <div class="md:flex mb-8">
            <div class="md:w-1/3">
                <legend class="uppercase tracking-wide text-sm">{{__('Data User')}}</legend>
                <p class="text-xs font-light text-red">{{__('Info related at user credentials.')}}</p>
            </div>
            <div class="md:flex-1 mt-2 mb:mt-0 md:px-3 shadow-lg pb-4">
                <div class="grid gap-4">
                    {{-- User name --}}
                    <div class="flex flex-col md:flex-row text-xs md:text-sm items-center">
                        <label class="w-full md:w-1/3" for="user_name">{{__('User name')}}</label>
                        <div class="flex flex-col space-y-2 w-full md:w-2/3 mt-1 md:mt-0">
                            <input wire:model.defer="auth.name" id="user_name" class="input input-sm @error('auth.name') border-error @enderror" type="text" placeholder="{{__('User name')}}" required />
                            @error('auth.name')
                                <div class="text-error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- User email --}}
                    <div class="flex flex-col md:flex-row text-xs md:text-sm items-center">
                        <label class="w-full md:w-1/3" for="user_email">{{__('User email')}}</label>
                        <div class="flex flex-col space-y-2 w-full md:w-2/3 mt-1 md:mt-0">
                            <input wire:model.defer="auth.email" id="user_email" class="input input-sm @error('auth.email') border-error @enderror" type="email" placeholder="{{__('User email')}}" required />
                            @error('auth.email')
                                <div class="text-error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:flex mb-8">
            <div class="md:w-1/3">
                <legend class="uppercase tracking-wide text-sm">{{__('Personal Info')}}</legend>
                <p class="text-xs font-light text-red">{{__('Info related at user.')}}</p>
            </div>
            <div class="md:flex-1 mt-2 mb:mt-0 md:px-3 shadow-lg pb-4">
                <div class="grid gap-4">
                    {{-- Firstname --}}
                    <div class="flex flex-col md:flex-row text-xs md:text-sm items-center">
                        <label class="w-full md:w-1/3" for="profile_firstname">{{__('Firstname')}}</label>
                        <div class="flex flex-col space-y-2 w-full md:w-2/3 mt-1 md:mt-0">
                            <input wire:model.defer="profile.firstname" id="profile_firstname" class="input input-sm @error('profile.firstname') border-error @enderror" type="text" placeholder="{{__('Firstname')}}" />
                            @error('profile.firstname')
                                <div class="text-error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- Lastname --}}
                    <div class="flex flex-col md:flex-row text-xs md:text-sm items-center">
                        <label class="w-full md:w-1/3" for="profile_lastname">{{__('Lastname')}}</label>
                        <div class="flex flex-col space-y-2 w-full md:w-2/3 mt-1 md:mt-0">
                            <input wire:model.defer="profile.lastname" id="profile_lastname" class="input input-sm @error('profile.lastname') border-error @enderror" type="text" placeholder="{{__('Lastname')}}" />
                            @error('profile.lastname')
                                <div class="text-error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- Phone --}}
                    <div class="flex flex-col md:flex-row text-xs md:text-sm items-center">
                        <label class="w-full md:w-1/3" for="profile_phone">{{__('Phone')}}</label>
                        <div class="flex flex-col space-y-2 w-full md:w-2/3 mt-1 md:mt-0">
                            <input wire:model.defer="profile.phone" id="profile_phone" class="input input-sm @error('profile.phone') border-error @enderror" type="text" placeholder="{{__('Phone')}}" />
                            @error('profile.phone')
                                <div class="text-error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- Upload Photo --}}
                    <div class="flex flex-col md:flex-row text-xs md:text-sm items-center">
                        <label class="w-full md:w-1/3" for="profile_image">{{__('Upload Photo')}}</label>
                        <div class="flex flex-col space-y-2 w-full md:w-2/3 mt-1 md:mt-0">
                            <div class="flex flex-1 space-x-2">
                                <div class="flex items-center h-20 w-20 rounded-full overflow-hidden">
                                    @if ($photo)
                                        <img class="h-16 w-16 rounded-full" src="{{ $photo->temporaryUrl() }}">
                                    @else
                                        <img class="h-16 w-16 rounded-full" src="{{ image_profile() }}">
                                    @endif
                                </div>
                                <div class="overflow-hidden relative w-64 md:w-full my-auto" 
                                    x-data="{ isUploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                    <button type="button" class="text-dark font-bold py-2 px-4 w-full inline-flex items-center bg-gray-200 dark:bg-gray-600 rounded-md h-8">
                                        <x-heroicon-o-upload class="h-4 w-4"/>
                                        <div class="ml-2 flex w-full justify-between items-center">
                                            <span class="whitespace-pre">{{__('Upload Photo')}}</span>
                                            @if ( $photo )
                                            <span class="ml-2 xl:text-xs">{{ $photo->getClientOriginalName()}}</span>
                                            @endif
                                        </div>
                                    </button>
                                    <input class="cursor-pointer absolute block py-2 px-4 w-full opacity-0 top-0 h-8" type="file"  wire:model="photo" accept="image/*">
                                    <!-- Progress Bar -->
                                    <div class="px-2 pt-2" x-show="isUploading">
                                        <progress class="w-full" max="100" x-bind:value="progress"></progress>
                                    </div>
                                </div>
                            </div>
                            @error('photo')
                                <div class="text-error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:flex mb-8">
            <div class="md:w-1/3">
                <legend class="uppercase tracking-wide text-sm">{{__('Password User')}}</legend>
                <p class="text-xs font-light text-red">{{__('Change here your password.')}}</p>
            </div>
            <div class="md:flex-1 mt-2 mb:mt-0 md:px-3 shadow-lg pb-4">
                <div class="grid gap-4">
                    {{-- New Password --}}
                    <div class="flex flex-col md:flex-row text-xs md:text-sm items-center">
                        <label class="w-full md:w-1/3" for="user_password">{{__('New Password')}}</label>
                        <div class="flex flex-col space-y-2 w-full md:w-2/3 mt-1 md:mt-0">
                            <div class="flex" x-data="{show: false}">
                                <div class="relative w-full">
                                    <input wire:model.defer="password" id="user_password" class="input input-sm w-full @error('password') border-error @enderror" :type="show ? 'text' : 'password'" placeholder="{{__('New Password')}}" />
                                    <button type="button" class="absolute inset-y-0 right-2 flex items-center" x-on:click="show=!show">
                                        <x-heroicon-o-eye class="h-4 w-4" x-show="show" />
                                        <x-heroicon-o-eye-off class="h-4 w-4" x-show="!show" />
                                    </button>
                                </div>
                                <button wire:click="generate" type="button" class="ml-2 btn-sm btn-default" title="Generar Password">
                                    <x-heroicon-o-key class="h-4 w-4" />
                                </button>
                            </div>
                            @error('password')
                                <div class="text-error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- password confirmation --}}
                    <div class="flex flex-col md:flex-row text-xs md:text-sm items-center">
                        <label class="w-full md:w-1/3" for="user_password_confirmation">{{__('Password Confirm')}}</label>
                        <div class="flex flex-col space-y-2 w-full md:w-2/3 mt-1 md:mt-0">
                            <input wire:model.defer="password_confirmation" id="user_password_confirmation" class="input input-sm @error('password_confirmation') border-error @enderror" type="password" placeholder="{{__('User password')}}" />
                            @error('password_confirmation')
                                <div class="text-error">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="md:flex mb-8">
            <div class="md:w-1/3">
                <legend class="uppercase tracking-wide text-sm"></legend>
            </div>
            <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                <div class="grid grid-cols-3">
                    <div class="hidden md:block col-span-1"></div>
                    <div class="col-span-3 md:col-span-2">
                        <div class="flex justify-between items-center">
                            <button type="submit" class="btn-sm btn-primary" wire:loading.attr="disabled" wire:target="save">{{__('Save User')}}</button>
                            <button type="button" class="btn-sm btn-warning" wire:click="cancel" wire:loading.attr="disabled" wire:target="save">{{__('Cancel')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
