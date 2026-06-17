<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Parent Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="space-y-6">

                <!-- Welcome Card -->
                <div class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-lg shadow-lg p-8">

                    <h2 class="text-3xl font-bold">
                        Welcome, {{ auth()->user()->name }}
                    </h2>

                    <p class="mt-2 text-purple-100">
                        Parent Portal
                    </p>

                </div>

                <!-- Student Information -->
                <div class="bg-white rounded-lg shadow p-6">

                    <h3 class="text-2xl font-bold mb-4">
                        Student Information
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <p class="text-sm text-gray-500">Student Name</p>
                            <p class="font-semibold">
                                {{ $parent->student->name ?? 'N/A' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Class</p>
                            <p class="font-semibold">
                                {{ $parent->student->schoolClass->name ?? 'N/A' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Section</p>
                            <p class="font-semibold">
                                {{ $parent->student->section->name ?? 'N/A' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Roll No</p>
                            <p class="font-semibold">
                                {{ $parent->student->roll_no ?? 'N/A' }}
                            </p>
                        </div>

                    </div>

                </div>

                <!-- Quick Actions -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <a href="/my-fees"
                       class="bg-blue-600 text-white rounded-lg p-6 shadow hover:shadow-lg transition">

                        <h3 class="text-xl font-bold">
                            Fee Details
                        </h3>

                        <p class="mt-2">
                            View student fee records.
                        </p>

                    </a>

                    <a href="/parent/leaves"
                       class="bg-green-600 text-white rounded-lg p-6 shadow hover:shadow-lg transition">

                        <h3 class="text-xl font-bold">
                            Leave Records
                        </h3>

                        <p class="mt-2">
                            View student leave history.
                        </p>

                    </a>

                    <a href="/parent/profile"
                       class="bg-purple-600 text-white rounded-lg p-6 shadow hover:shadow-lg transition">

                        <h3 class="text-xl font-bold">
                            My Profile
                        </h3>

                        <p class="mt-2">
                            View parent profile.
                        </p>

                    </a>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>