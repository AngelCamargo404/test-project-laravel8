<x-app-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('build/assets/formCursos.css') }}">
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Somos Excelencia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row">
                    <div class="col-lg-12">
                        <livewire:crear-producto />
                    </div>
                </div>
                <!-- /ROW-1 CLOSED -->
            </div>
        </div>
    </div>
</x-app-layout>