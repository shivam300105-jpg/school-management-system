<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Profile
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-8">

                    <div class="space-y-4">

                        <div>
                            <strong>Name:</strong>
                            {{ Auth::user()->name }}
                        </div>

                        <div>
                            <strong>Email:</strong>
                            {{ Auth::user()->email }}
                        </div>

                        <div>
                            <strong>Role:</strong>
                            {{ Auth::user()->role }}
                        </div>

                    </div>

                    <a
                        href="/student/dashboard"
                        class="inline-block mt-6 bg-blue-600 text-white px-4 py-2 rounded"
                    >
                        Back
                    </a>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>