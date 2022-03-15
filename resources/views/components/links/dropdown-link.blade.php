<a {{ $attributes->merge(['class' => 'text-sm rounded-r-md flex items-center space-x-2 whitespace-nowrap px-4 py-2 w-full hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200']) }}>
    <span class="text-sm">
        {{ $slot }}
    </span>
</a>