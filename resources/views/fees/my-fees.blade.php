<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Fees
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <h2 class="text-2xl font-bold mb-6">
                    My Fee Records
                </h2>

                <table class="w-full border">

                    <thead>
                        <tr class="bg-gray-100">

                            <th class="border p-2">Amount</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Payment Date</th>

                        </tr>
                    </thead>

                    <tbody>

                        @forelse($fees as $fee)

                        <tr>

                            <td class="border p-2">
                                ₹{{ $fee->amount }}
                            </td>

                            <td class="border p-2">

                                @if($fee->status == 'Paid')

                                    <span class="text-green-600 font-bold">
                                        Paid
                                    </span>

                                @else

                                    <span class="text-red-600 font-bold">
                                        Pending
                                    </span>

                                @endif

                            </td>

                            <td class="border p-2">
                                {{ $fee->payment_date }}
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3"
                                class="text-center p-4">

                                No Fee Records Found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>