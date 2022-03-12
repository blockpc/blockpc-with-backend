@extends('layouts.backend.app')

@section('title', __('Users List'))

@section('content')
<div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg px-1" x-data="{open: 'table'}">
    <div class="py-4 bg-dark border-b border-gray-200 dark:border-gray-600 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <x-heroicon-s-users class="w-6 h-6 fill-current" />
            <span x-show="open=='table'">{{__('Users List')}}</span>
            <span x-show="open=='new'">{{__('New User')}}</span>
            <span x-show="open=='edit'">{{__('Edit User')}}</span>
        </div>
        <div class="">
            @if ( current_user()->can('user create') )
            <button class="btn-sm btn-primary flex items-center space-x-2" x-show="open=='table'" x-on:click="open='new'" title="{{__('New User')}}">
                <x-bx-plus class="w-4 h-4" />
            </button>
            <button class="btn-sm btn-warning flex items-center space-x-2" x-show="open!='table'" x-on:click="open='table', Livewire.emitTo('system.users.form-user', 'cancel-form-user')" title="{{__('Cancel')}}">
                <x-bx-x class="w-4 h-4" />
            </button>
            @endif
        </div>
    </div>
    <div class="py-4">
        <div class="" x-show="open=='table'">
            @livewire('system.users.table', [], key('system.users.table-'.current_user()->id))
        </div>
        <div class="" x-show="open!='table'">
            @livewire('system.users.form-user', [], key('system.users.form-user-'.current_user()->id))
        </div>
    </div>
</div>
@endsection