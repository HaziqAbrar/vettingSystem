<x-sidebarStudent>
<div class="container-table100">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <x-jet-section-border />
    <div>
        <div class="row">
        <div class="col">

        <x-jet-section-title>
        <x-slot name="title">Update Profile Photo</x-slot>
        <x-slot name="description">Update your account\'s profile photo.</x-slot>
    </x-jet-section-title>
        
        <!-- <h5> Update Profile Photo </h5> -->
        </div>
        <div class="col">
            <form action="/upload" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image">
            <input class="w3-margin btn btn-dark"type="submit" value="Upload" />
            <!-- <a class="w3-margin btn btn-dark" type="submit" role="button">Upload</a> -->
            </form>
            @if (session('status'))
          <div class=" alert alert-success">
            {{ session('status') }}
          </div>
        @endif
        </div>
        </div>
        
       
        <x-jet-section-border />
            
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif



            <div class="mt-10 sm:mt-0">
                @livewire('profile.delete-user-form')
            </div>
        </div>
    </div>


</div>
</x-sidebarStudent>