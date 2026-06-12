<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Staff
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-md rounded-lg p-6">

                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    Edit Staff
                </h2>

                @if($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/staff/{{ $staff->id }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ $staff->name }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2"
                            >
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ $staff->email }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2"
                            >
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Phone
                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ $staff->phone }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2"
                            >
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Designation
                            </label>

                            <input
                                type="text"
                                name="designation"
                                value="{{ $staff->designation }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2"
                            >
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Salary
                            </label>

                            <input
                                type="text"
                                name="salary"
                                value="{{ $staff->salary }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2"
                            >
                        </div>

                    </div>

                    <div class="mt-6">

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg"
                        >
                            Update Staff
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>