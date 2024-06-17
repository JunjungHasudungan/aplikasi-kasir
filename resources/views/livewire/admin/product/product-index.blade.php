<x-app-layout>
    <title>{{ $title ?? 'Page Title' }} | {{ config('app.name') }}</title>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div>
                        <div class="grid grid-cols-2 md:grid-cols-2 gap-2">

                            <div>
                                <livewire:admin.product.product-create />
                            </div>

                            <div>
                                <livewire:admin.product.product-table />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
