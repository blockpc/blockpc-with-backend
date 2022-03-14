@props(['name' => 'Link', 'route' => '#'])
<div {{ $attributes->merge(['class' => 'relative group hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200']) }}>
    <a class="flex items-center py-2" href="{{$route}}">
        <div class="w-16">
            {{ $icon }}
        </div>
        <div class="link-name w-48 hidden md:block">
            {{$name}}
        </div>
    </a>
    <div class="mobil-link-name">
        <div class="flex items-center space-x-2">
            <x-bx-chevron-right class="w-4 h-4" />
            <a href="{{$route}}" class="link-name whitespace-nowrap">{{$name}}</a>
        </div>
    </div>
</div>