<div class="bg-white dark:bg-gray-800 w-64 fixed h-sidebar left-0 top-16 transform transition-all duration-500 ease-in-out z-50 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400 py-2 shadow font-roboto font-semibold" :class="sidebar ? 'translate-x-0' : '-translate-x-full'" x-on:click.away="sidebar=false" x-show="sidebar" x-cloak
x-transition:enter="translate-x-0 ease-out duration-200"
x-transition:enter-start="opacity-0"
x-transition:enter-end="opacity-100"
x-transition:leave="translate-x-0 ease-in duration-200"
x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0">
    {{-- menu sidebar --}}
    <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        <div class="flex space-x-2 items-center">
            <x-bx-layout class="w-5 h-5 fill-current" />
            <span>{{__('Dashboard')}}</span>
        </div>
    </x-sidebar-link>
    <hr class="border border-gray-200 dark:border-gray-600 mx-2">
    <x-sidebar-dropdown :active="request()->routeIs('menus.*')">
        <x-slot name="trigger">
            <div class="flex space-x-2 items-center">
                <x-bx-code class="w-5 h-5" />
                <span>{{__('Mas Menus')}}</span>
            </div>
        </x-slot>
        <x-slot name="content">
            <x-sidebar-submenu href="{{ route('menus.one') }}">
                {{__('Menu Uno')}}
            </x-sidebar-submenu>
            <x-sidebar-submenu href="{{ route('menus.two') }}">
                {{__('Menu Dos')}}
            </x-sidebar-submenu>
            <x-sidebar-submenu href="{{ route('menus.three') }}">
                {{__('Menu Tres')}}
            </x-sidebar-submenu>
        </x-slot>
    </x-sidebar-dropdown>
    <hr class="border border-gray-200 dark:border-gray-600 mx-2">
    {{-- User List --}}
    @if ( current_user()->can('user list') )
    <x-sidebar-link :href="route('users')" :active="request()->routeIs('users')">
        <div class="flex space-x-2 items-center">
            <x-heroicon-s-users class="w-5 h-5" />
            <span>{{__('Users')}}</span>
        </div>
    </x-sidebar-link>
    @endif
    {{-- Role List --}}
    @if ( current_user()->can('role list') )
    <x-sidebar-link :href="route('roles.index')" :active="request()->routeIs('roles.index')">
        <div class="flex space-x-2 items-center">
            <x-bx-shield class="w-5 h-5" />
            <span>{{__('Roles')}}</span>
        </div>
    </x-sidebar-link>
    @endif
    {{-- Permission List --}}
    @if ( current_user()->can('permission list') )
    <x-sidebar-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index')">
        <div class="flex space-x-2 items-center">
            <x-bx-label class="w-5 h-5" />
            <span>{{__('Permissions')}}</span>
        </div>
    </x-sidebar-link>
    @endif
</div>