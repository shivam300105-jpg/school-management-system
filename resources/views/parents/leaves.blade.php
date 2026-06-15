<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Child Leave Records
    </h2>
</x-slot>

<div class="py-6">
    <div class="max-w-7xl mx-auto">

        <div class="bg-white shadow rounded-lg p-6">

            <table class="w-full">

                <thead>
                    <tr>
                        <th>Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($leaves as $leave)

                    <tr>
                        <td>{{ $leave->leave_type }}</td>
                        <td>{{ $leave->from_date }}</td>
                        <td>{{ $leave->to_date }}</td>
                        <td>{{ $leave->status }}</td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="4">
                            No Leave Records Found
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>
</div>

</x-app-layout>