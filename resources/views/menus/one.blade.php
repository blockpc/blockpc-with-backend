@extends('layouts.backend.app')

@section('title', __('Menu Uno'))

@section('content')
<div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg px-1">
    <div class="py-4 bg-dark border-b border-gray-200 dark:border-gray-600 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <x-bx-code class="w-6 h-6" />
            <span>{{__('Menu Uno')}}</span>
        </div>
        <div class=""></div>
    </div>
    <div class="py-4">
    </div>
</div>
@endsection