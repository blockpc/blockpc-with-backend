@extends('layouts.backend.app')

@section('title', 'Dashboard')

@section('content')
<div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-4 bg-dark border-b border-gray-200 dark:border-gray-600 flex justify-between items-center">
        <div class="flex space-x-2 items-center">
            <x-bx-layout class="w-6 h-6" />
            <span>{{__('Dashboard')}}</span>
        </div>
        <div class=""></div>
    </div>
    <div class="">
        @livewire('system.dashboards.admin', [], key('system.dashboards.admin-'.$user->id))
    </div>
</div>
@endsection