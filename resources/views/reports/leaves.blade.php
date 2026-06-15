<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Leave Report
    </h2>
</x-slot>

<div class="py-6">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="bg-white shadow rounded-lg p-6">

    <h2 class="text-2xl font-bold mb-4">
        Leave Report
    </h2>

    <table class="w-full border">

        <thead>

        <tr class="bg-gray-100">

            <th class="border p-2">User</th>
            <th class="border p-2">Leave Type</th>
            <th class="border p-2">From</th>
            <th class="border p-2">To</th>
            <th class="border p-2">Status</th>

        </tr>

        </thead>

        <tbody>

        @foreach($leaves as $leave)

        <tr>

            <td class="border p-2">
                {{ $leave->user->name }}
            </td>

            <td class="border p-2">
                {{ $leave->leave_type }}
            </td>

            <td class="border p-2">
                {{ $leave->from_date }}
            </td>

            <td class="border p-2">
                {{ $leave->to_date }}
            </td>

            <td class="border p-2">
                {{ $leave->status }}
            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

</div>
</div>

</x-app-layout>