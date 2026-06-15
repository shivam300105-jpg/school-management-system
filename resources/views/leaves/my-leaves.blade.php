<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Leave History
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex justify-end mb-4">

                    <a href="/leaves/create"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

                            + Apply Leave
                    </a>

                </div>
                <table class="w-full border">

                    <thead>
                        <tr class="bg-gray-100">

                            <th class="border p-2">Leave Type</th>
                            <th class="border p-2">From</th>
                            <th class="border p-2">To</th>
                            <th class="border p-2">Reason</th>
                            <th class="border p-2">Status</th>

                        </tr>
                    </thead>

                    <tbody>

                    @forelse($leaves as $leave)

                        <tr>

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
                                {{ $leave->reason }}
                            </td>

                            <td class="border p-2">

                                @if($leave->status == 'Pending')
                                    <span class="text-yellow-600 font-bold">
                                        Pending
                                    </span>
                                @elseif($leave->status == 'Approved')
                                    <span class="text-green-600 font-bold">
                                        Approved
                                    </span>
                                @else
                                    <span class="text-red-600 font-bold">
                                        Rejected
                                    </span>
                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="text-center p-4">
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