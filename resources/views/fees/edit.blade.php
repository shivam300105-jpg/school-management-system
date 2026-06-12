<x-app-layout>


<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Fee
    </h2>
</x-slot>


<div class="py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

    <div class="bg-white shadow-md rounded-lg p-6">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Edit Fee
        </h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/fees/{{ $fee->id }}" method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <label class="block text-gray-700 font-medium mb-2">
                        Amount
                    </label>

                    <input
                        type="number"
                        name="amount"
                        value="{{ $fee->amount }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2"
                    >
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">
                        Month
                    </label>

                    <select
                        name="month"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2"
                    >

                        <option value="January" {{ $fee->month == 'January' ? 'selected' : '' }}>January</option>
                        <option value="February" {{ $fee->month == 'February' ? 'selected' : '' }}>February</option>
                        <option value="March" {{ $fee->month == 'March' ? 'selected' : '' }}>March</option>
                        <option value="April" {{ $fee->month == 'April' ? 'selected' : '' }}>April</option>
                        <option value="May" {{ $fee->month == 'May' ? 'selected' : '' }}>May</option>
                        <option value="June" {{ $fee->month == 'June' ? 'selected' : '' }}>June</option>
                        <option value="July" {{ $fee->month == 'July' ? 'selected' : '' }}>July</option>
                        <option value="August" {{ $fee->month == 'August' ? 'selected' : '' }}>August</option>
                        <option value="September" {{ $fee->month == 'September' ? 'selected' : '' }}>September</option>
                        <option value="October" {{ $fee->month == 'October' ? 'selected' : '' }}>October</option>
                        <option value="November" {{ $fee->month == 'November' ? 'selected' : '' }}>November</option>
                        <option value="December" {{ $fee->month == 'December' ? 'selected' : '' }}>December</option>

                    </select>

                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2"
                    >

                        <option value="Pending"
                            {{ $fee->status == 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="Paid"
                            {{ $fee->status == 'Paid' ? 'selected' : '' }}>
                            Paid
                        </option>

                    </select>

                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">
                        Payment Date
                    </label>

                    <input
                        type="date"
                        name="payment_date"
                        value="{{ $fee->payment_date }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2"
                    >
                </div>

            </div>

            <div class="mt-6">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg"
                >
                    Update Fee
                </button>

            </div>

        </form>

    </div>

</div>


</div>


</x-app-layout>