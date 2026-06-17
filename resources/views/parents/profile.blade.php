<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Parent Profile
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <x-profile-card
                :name="$parent->father_name"
                role="Parent"

:details="[
    'Mother Name' => $parent->mother_name,
    'Email' => $parent->email,
    'Phone' => $parent->phone,
    'Address' => $parent->address,

    'Student Name' => $parent->student->name ?? 'N/A',
    'Class' => $parent->student->schoolClass->name ?? 'N/A',
    'Section' => $parent->student->section->name ?? 'N/A',
    'Roll Number' => $parent->student->roll_no ?? 'N/A'
]"

                :actions="[
                    [
                        'title' => 'Dashboard',
                        'description' => 'Return to dashboard',
                        'url' => '/parent/dashboard'
                    ],
                    [
                        'title' => 'Fee Details',
                        'description' => 'View fee records',
                        'url' => '/my-fees'
                    ],
                    [
                        'title' => 'Leave Records',
                        'description' => 'View leave history',
                        'url' => '/parent/leaves'
                    ]
                ]"
            />

        </div>
    </div>

</x-app-layout>