<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Staff Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="space-y-6">

                <!-- Welcome Card -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 shadow">
                    <h2 class="text-2xl font-bold">
                        Welcome {{ $staff->name }}
                    </h2>

                    <p class="text-gray-600 mt-2">
                        Designation:
                        {{ $staff->designation }}
                    </p>

                    <p class="text-gray-600">
                        Phone:
                        {{ $staff->phone }}
                    </p>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

                    <div class="bg-blue-600 text-white rounded-lg p-6 shadow">
                        <h3 class="text-lg font-semibold">
                            Total Leaves
                        </h3>

                        <p class="text-3xl font-bold mt-2">
                            {{ $totalLeaves }}
                        </p>
                    </div>

                    <div class="bg-green-600 text-white rounded-lg p-6 shadow">
                        <h3 class="text-lg font-semibold">
                            Approved
                        </h3>

                        <p class="text-3xl font-bold mt-2">
                            {{ $approvedLeaves }}
                        </p>
                    </div>

                    <div class="bg-yellow-500 text-white rounded-lg p-6 shadow">
                        <h3 class="text-lg font-semibold">
                            Pending
                        </h3>

                        <p class="text-3xl font-bold mt-2">
                            {{ $pendingLeaves }}
                        </p>
                    </div>

                    <div class="bg-red-600 text-white rounded-lg p-6 shadow">
                        <h3 class="text-lg font-semibold">
                            Rejected
                        </h3>

                        <p class="text-3xl font-bold mt-2">
                            {{ $rejectedLeaves }}
                        </p>
                    </div>

                </div>

                <!-- Quick Actions -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <a href="/staff/profile"
                       class="bg-blue-600 text-white rounded-lg p-6 shadow hover:shadow-lg transition">

                        <h3 class="text-xl font-bold">
                            My Profile
                        </h3>

                        <p class="mt-2">
                            View your profile details.
                        </p>

                    </a>

                    <a href="{{ route('leaves.create') }}"
                       class="bg-green-600 text-white rounded-lg p-6 shadow hover:shadow-lg transition">

                        <h3 class="text-xl font-bold">
                            Apply Leave
                        </h3>

                        <p class="mt-2">
                            Submit a leave request.
                        </p>

                    </a>

                    <a href="/my-leaves"
                       class="bg-purple-600 text-white rounded-lg p-6 shadow hover:shadow-lg transition">

                        <h3 class="text-xl font-bold">
                            Leave History
                        </h3>

                        <p class="mt-2">
                            View all leave records.
                        </p>

                    </a>

                </div>

                <!-- Recent Leave Requests -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">

                        <h2 class="text-xl font-bold mb-4">
                            Recent Leave Requests
                        </h2>

                        <table class="min-w-full">

                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3">Date</th>
                                    <th class="text-left py-3">Reason</th>
                                    <th class="text-left py-3">Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($recentLeaves as $leave)

                                <tr class="border-b">

                                    <td class="py-3">
                                        {{ $leave->created_at->format('d M Y') }}
                                    </td>

                                    <td class="py-3">
                                        {{ $leave->reason }}
                                    </td>

                                    <td class="py-3">
                                        <span class="px-3 py-1 rounded-full text-sm
                                            @if($leave->status == 'approved')
                                                bg-green-100 text-green-700
                                            @elseif($leave->status == 'pending')
                                                bg-yellow-100 text-yellow-700
                                            @else
                                                bg-red-100 text-red-700
                                            @endif">

                                            {{ ucfirst($leave->status) }}

                                        </span>
                                    </td>

                                </tr>

                                @empty

                                <tr>
                                    <td colspan="3" class="text-center py-4 text-gray-500">
                                        No leave records found.
                                    </td>
                                </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>