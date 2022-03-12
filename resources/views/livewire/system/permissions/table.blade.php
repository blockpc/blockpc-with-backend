<div>
    <div class="flex-col space-y-4">
        <div class="flex flex-col space-y-2" x-data="{ selected: null }">
            @forelse ($permissions as $group => $collection)
                <div class="overflow-hidden w-full dark:text-gray-200 text-gray-700">
                    <button type="button" class="w-full p-2 rounded-lg dark:bg-gray-900 bg-gray-200" x-on:click="selected !==  {{$loop->iteration}} ? selected = {{$loop->iteration}} : selected = null">
                        <div class="flex items-center justify-between">
                            <span class="text-base md:text-lg font-semibold">{{__(Str::title($group))}}</span>
                            <div :class="selected == {{$loop->iteration}} ? 'transform rotate-180' : 'transform rotate-0'">
                                <x-bx-chevron-down class="w-4 h-4"/>
                            </div>
                        </div>
                    </button>
                    <div class="grid grid-cols-2 gap-4 p-2" x-show="selected == {{$loop->iteration}}" x-collapse.duration.1000ms>
                        @foreach ($collection as $id => $permission)
                        <div class="col-span-1 flex flex-col hover:bg-gray-200 dark:hover:bg-gray-600 p-2 rounded-md">
                            <span class="text-base md:text-lg">{{$permission->display_name}}</span>
                            <span class="mt-1 text-xs">{{$permission->description}}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</div>
