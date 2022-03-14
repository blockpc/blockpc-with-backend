@props(['name' => 'Link'])

<div class="relative group hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200">
    <div class="dropdown-links flex items-center py-2 cursor-default">
        <div class="flex items-center">
            <span class="w-16">
                {{ $icon }}
            </span>
            <div class="w-48 hidden md:block">
                <div class="flex items-center">
                    <span class="link-name w-40">{{$name}}</span>
                    <div class="w-8 transform rotate-0 group-hover:transform group-hover:rotate-180">
                        <x-bx-chevron-left class="fill-current h-4 w-4 mx-auto" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-menu">
        {{ $content }}
    </div>
</div>