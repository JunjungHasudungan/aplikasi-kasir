<x-app-layout>
    <title>{{ $pageTitle }} | {{ config('app.name') }} </title>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div>
                        <div class="grid grid-cols-2 md:grid-cols-2 gap-2">
                            {{-- start for form --}}
                                <livewire:product.product-table />
                            {{-- end for form --}}

                            {{-- start for table --}}
                            <div>
                                <livewire:product.product-create />
                            </div>
                            {{-- end for table --}}

                        </div>
                    </div>



                    {{-- @livewire('products') --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
