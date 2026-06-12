<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Students
        </h2>
    </x-slot>

<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow-md rounded-lg p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold text-gray-800">
                    All Students
                </h2>

                <a href="/students/create"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    + Add Student
                </a>

            </div>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">

                <table class="min-w-full border border-gray-200">

                    <thead class="bg-gray-100">

                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Class</th>
                            <th class="px-4 py-3 text-left">Section</th>
                            <th class="px-4 py-3 text-left">Name</th>
                            <th class="px-4 py-3 text-left">Roll No</th>
                            <th class="px-4 py-3 text-left">Phone</th>
                            <th class="px-4 py-3 text-left">Edit</th>
                            <th class="px-4 py-3 text-left">Delete</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($students as $student)

                        <tr class="border-t">

                            <td class="px-4 py-3">
                                {{ $student->id }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $student->schoolClass->name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $student->section->name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $student->name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $student->roll_no }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $student->phone }}
                            </td>

                            <td class="px-4 py-3">

                                <a href="{{ route('students.edit', $student->id) }}"
                                   class="text-blue-600 hover:underline">
                                    Edit
                                </a>

                            </td>

                            <td class="px-4 py-3">

                                <form
                                    action="/students/{{ $student->id }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Are you sure?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>
</div>

</x-app-layout>