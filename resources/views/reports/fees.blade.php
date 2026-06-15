<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Fees Report
    </h2>
</x-slot>

<div class="py-6">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="bg-white shadow rounded-lg p-6">

    <h2 class="text-2xl font-bold mb-4">
        Fees Report
    </h2>

    <table class="w-full border">

        <thead>

        <tr class="bg-gray-100">

            <th class="border p-2">Student</th>
            <th class="border p-2">Amount</th>
            <th class="border p-2">Status</th>
            <th class="border p-2">Payment Date</th>

        </tr>

        </thead>

        <tbody>

        @foreach($fees as $fee)

        <tr>

            <td class="border p-2">
                {{ $fee->student->name }}
            </td>

            <td class="border p-2">
                ₹{{ $fee->amount }}
            </td>

            <td class="border p-2">
                {{ $fee->status }}
            </td>

            <td class="border p-2">
                {{ $fee->payment_date }}
            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

</div>
</div>

</x-app-layout>