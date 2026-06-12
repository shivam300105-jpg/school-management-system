<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6">

                <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white shadow-lg rounded-xl p-6">
                    <h3 class="text-sm uppercase tracking-wide">
                        Classes
                    </h3>

                    <p class="text-4xl font-bold mt-2">
                        {{ $totalClasses }}
                    </p>

                    <p class="text-sm mt-2">
                        Total Classes
                    </p>
                </div>

                <div class="bg-gradient-to-r from-green-500 to-green-700 text-white shadow-lg rounded-xl p-6">
                    <h3 class="text-sm uppercase tracking-wide">
                        Sections
                    </h3>

                    <p class="text-4xl font-bold mt-2">
                        {{ $totalSections }}
                    </p>

                    <p class="text-sm mt-2">
                        Total Sections
                    </p>
                </div>

                <div class="bg-gradient-to-r from-purple-500 to-purple-700 text-white shadow-lg rounded-xl p-6">
                    <h3 class="text-sm uppercase tracking-wide">
                        Students
                    </h3>

                    <p class="text-4xl font-bold mt-2">
                        {{ $totalStudents }}
                    </p>

                    <p class="text-sm mt-2">
                        Registered Students
                    </p>
                </div>

                <div class="bg-gradient-to-r from-yellow-500 to-orange-600 text-white shadow-lg rounded-xl p-6">
                    <h3 class="text-sm uppercase tracking-wide">
                        Staff
                    </h3>

                    <p class="text-4xl font-bold mt-2">
                        {{ $totalStaff }}
                    </p>

                    <p class="text-sm mt-2">
                        School Staff
                    </p>
                </div>

                <div class="bg-gradient-to-r from-pink-500 to-red-600 text-white shadow-lg rounded-xl p-6">
                    <h3 class="text-sm uppercase tracking-wide">
                        Parents
                    </h3>

                    <p class="text-4xl font-bold mt-2">
                        {{ $totalParents }}
                    </p>

                    <p class="text-sm mt-2">
                        Parent Records
                    </p>
                </div>

                <div class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white shadow-lg rounded-xl p-6">
    <h3 class="text-sm uppercase tracking-wide">
        Fee Records
    </h3>


<p class="text-4xl font-bold mt-2">
    {{ $totalFees }}
</p>

<p class="text-sm mt-2">
    Total Fee Entries
</p>


</div>



            </div>

            <!-- School Overview -->
            <div class="mt-8 bg-white shadow-lg rounded-xl p-6">

                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    School Overview
                </h3>

                <p class="text-gray-600">
                    Welcome to the School Management System Admin Dashboard.
                    From here you can manage Classes, Sections, Students,
                    Staff Members and Parent Records efficiently.
                </p>

            </div>

            <!-- Quick Actions -->
            <div class="mt-8">

                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    Quick Actions
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <a href="/students/create"
                       class="bg-blue-600 text-white p-6 rounded-xl shadow-lg hover:bg-blue-700 transition">

                        <h4 class="font-bold text-lg">
                            Add Student
                        </h4>

                        <p class="text-sm mt-2">
                            Register a new student into the system.
                        </p>

                    </a>

                    <a href="/staff/create"
                       class="bg-green-600 text-white p-6 rounded-xl shadow-lg hover:bg-green-700 transition">

                        <h4 class="font-bold text-lg">
                            Add Staff
                        </h4>

                        <p class="text-sm mt-2">
                            Create a new staff member record.
                        </p>

                    </a>

                    <a href="/parents/create"
                       class="bg-purple-600 text-white p-6 rounded-xl shadow-lg hover:bg-purple-700 transition">

                        <h4 class="font-bold text-lg">
                            Add Parent
                        </h4>

                        <p class="text-sm mt-2">
                            Add a parent and connect them with a student.
                        </p>

                    </a>
                    <a href="/fees/create"
   class="bg-indigo-600 text-white p-6 rounded-xl shadow-lg hover:bg-indigo-700 transition">

    <h4 class="font-bold text-lg">
        Add Fee
    </h4>

    <p class="text-sm mt-2">
        Create a new student fee record.
    </p>

</a>
                </div>

            </div>

        </div>
    </div>

</x-app-layout>