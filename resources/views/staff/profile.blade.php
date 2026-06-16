<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            My Profile
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <p><strong>Name:</strong> {{ $staff->name }}</p>

                <p><strong>Email:</strong> {{ $staff->email }}</p>

                <p><strong>Phone:</strong> {{ $staff->phone }}</p>

                <p><strong>Designation:</strong> {{ $staff->designation }}</p>

                <p><strong>Salary:</strong> ₹{{ $staff->salary }}</p>

            </div>

        </div>
    </div>

</x-app-layout>