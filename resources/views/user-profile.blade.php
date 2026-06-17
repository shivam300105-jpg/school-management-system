<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Profile
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <x-profile-card
                :name="$student->name ?? Auth::user()->name"
                role="Student"

                :details="[
                    'Email' => $student->email ?? Auth::user()->email,
                    'Phone' => $student->phone ?? 'N/A',
                    'Roll Number' => $student->roll_no ?? 'N/A',
                    'Class' => $student->schoolClass->name ?? 'N/A',
                    'Section' => $student->section->name ?? 'N/A',
                    'Address' => $student->address ?? 'N/A',
                    'Role' => Auth::user()->role
                ]"

                :actions="[
                    [
                        'title' => 'Dashboard',
                        'description' => 'Return to dashboard',
                        'url' => '/student/dashboard'
                    ],
                    [
                        'title' => 'My Fees',
                        'description' => 'View fee details',
                        'url' => '/my-fees'
                    ],
                    [
                        'title' => 'Leave History',
                        'description' => 'View leave records',
                        'url' => '/my-leaves'
                    ]
                ]"
            />

        </div>
    </div>

</x-app-layout>