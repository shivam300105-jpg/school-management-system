<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Leave Requests
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <table class="w-full border">

                    <thead>
                        <tr class="bg-gray-100">

                            <th class="border p-2">User</th>
                            <th class="border p-2">Role</th>
                            <th class="border p-2">Leave Type</th>
                            <th class="border p-2">From</th>
                            <th class="border p-2">To</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Action</th>

                        </tr>
                    </thead>

                    <tbody>

                    @foreach($leaves as $leave)

                        <tr>

                            <td class="border p-2">
                                {{ $leave->user->name }}
                            </td>
                            
                            <td class="border p-2">

                                @if($leave->user->role == 'staff')

                                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded">
                                        Staff
                                    </span>

                                @elseif($leave->user->role == 'student')

                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                        Student
                                    </span>
                                @endif

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

                            <td class="border p-2">

                                @if($leave->status == 'Pending')

                                <form
                                    action="/leaves/{{ $leave->id }}/approve"
                                    method="POST"
                                    class="inline"
                                >
                                    @csrf
                                    @method('PUT')

                                    <button
                                        class="bg-green-500 text-white px-3 py-1 rounded"
                                    >
                                        Approve
                                    </button>

                                </form>

                                <form
                                    action="/leaves/{{ $leave->id }}/reject"
                                    method="POST"
                                    class="inline"
                                >
                                    @csrf
                                    @method('PUT')

                                    <button
                                        class="bg-red-500 text-white px-3 py-1 rounded"
                                    >
                                        Reject
                                    </button>

                                </form>

                                @else

                                    {{ $leave->status }}

                                @endif

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>