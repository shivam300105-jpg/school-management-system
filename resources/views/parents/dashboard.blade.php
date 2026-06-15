<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Parent Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6 mb-6">

                <h2 class="text-3xl font-bold text-gray-800">
                    Welcome, {{ auth()->user()->name }}
                </h2>

                <p class="text-gray-600 mt-2">
                    Parent Portal
                </p>

            </div>

            <div class="bg-white shadow rounded-lg p-6 mb-6">

                <h3 class="text-2xl font-bold mb-4">
                    Student Information
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <strong>Student Name:</strong>
                        {{ $parent->student->name ?? 'N/A' }}
                    </div>

                    <div>
                        <strong>Class:</strong>
                        {{ $parent->student->schoolClass->name ?? 'N/A' }}
                    </div>

                    <div>
                        <strong>Section:</strong>
                        {{ $parent->student->section->name ?? 'N/A' }}
                    </div>

                    <div>
                        <strong>Roll No:</strong>
                        {{ $parent->student->roll_no ?? 'N/A' }}
                    </div>

                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

<a href="/my-fees"
   class="block bg-blue-500 text-white p-6 rounded-lg shadow">

    <h3 class="text-xl font-bold">
        Fees
    </h3>

    <p class="mt-2">
        View fee details
    </p>

</a>

<a href="/parent/leaves"
   class="block bg-green-500 text-white p-6 rounded-lg shadow hover:bg-green-600">

    <h3 class="text-xl font-bold">
        Leaves
    </h3>

    <p class="mt-2">
        View leave records
    </p>

</a>

<a href="/parent/profile"
   class="block bg-purple-500 text-white p-6 rounded-lg shadow">

    <h3 class="text-xl font-bold">
        Profile
    </h3>

    <p class="mt-2">
        Parent information
    </p>

</a>

            </div>

        </div>
    </div>

</x-app-layout>