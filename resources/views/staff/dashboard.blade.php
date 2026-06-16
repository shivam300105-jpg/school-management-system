<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Staff Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="space-y-6">

    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
        <h2 class="text-2xl font-bold">
            Welcome {{ $staff->name }}
        </h2>

        <p class="text-gray-600 mt-2">
            Designation:
            {{ $staff->designation }}
        </p>

        <p class="text-gray-600">
            Phone:
            {{ $staff->phone }}
        </p>
    </div>

</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>