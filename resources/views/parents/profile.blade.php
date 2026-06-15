<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Parent Profile
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <h3 class="text-2xl font-bold mb-6">
                    Parent Information
                </h3>

                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <strong>Father Name:</strong>
                        {{ $parent->father_name }}
                    </div>

                    <div>
                        <strong>Mother Name:</strong>
                        {{ $parent->mother_name }}
                    </div>

                    <div>
                        <strong>Email:</strong>
                        {{ $parent->email }}
                    </div>

                    <div>
                        <strong>Phone:</strong>
                        {{ $parent->phone }}
                    </div>

                    <div class="col-span-2">
                        <strong>Address:</strong>
                        {{ $parent->address }}
                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>