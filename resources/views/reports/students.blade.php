<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Student Report
    </h2>
</x-slot>

<div class="py-6">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<div class="bg-white shadow rounded-lg p-6">

    <h2 class="text-2xl font-bold mb-4">
        Student Report
    </h2>

    <table class="w-full border">

        <thead>

        <tr class="bg-gray-100">

            <th class="border p-2">Name</th>
            <th class="border p-2">Email</th>
            <th class="border p-2">Phone</th>
            <th class="border p-2">Roll No</th>

        </tr>

        </thead>

        <tbody>

        @foreach($students as $student)

        <tr>

            <td class="border p-2">
                {{ $student->name }}
            </td>

            <td class="border p-2">
                {{ $student->email }}
            </td>

            <td class="border p-2">
                {{ $student->phone }}
            </td>

            <td class="border p-2">
                {{ $student->roll_no }}
            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>

</div>
</div>

</x-app-layout>