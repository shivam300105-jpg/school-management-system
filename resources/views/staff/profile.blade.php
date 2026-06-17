<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Profile
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <x-profile-card
                :name="$staff->name"
                role="Staff Member"

                :details="[
                    'Email' => $staff->email,
                    'Phone' => $staff->phone,
                    'Designation' => $staff->designation,
                    'Salary' => '₹'.number_format($staff->salary),
                    'Employee ID' => 'EMP-'.str_pad($staff->id,4,'0',STR_PAD_LEFT)
                ]"

                :actions="[
                    [
                        'title' => 'Dashboard',
                        'description' => 'Return to dashboard',
                        'url' => '/staff/dashboard'
                    ],
                    [
                        'title' => 'Apply Leave',
                        'description' => 'Submit leave request',
                        'url' => route('leaves.create')
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