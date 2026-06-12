<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Student
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-md rounded-lg p-6">

                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    Edit Student
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

                <form action="/students/{{ $student->id }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Select Class
                            </label>

                            <select
                                name="class_id"
                                id="class_id"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2"
                            >
                                @foreach($classes as $class)
                                    <option
                                        value="{{ $class->id }}"
                                        {{ $student->class_id == $class->id ? 'selected' : '' }}
                                    >
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Select Section
                            </label>

                            <select
                                name="section_id"
                                id="section_id"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2"
                            >
                                @foreach($sections as $section)
                                    <option
                                        value="{{ $section->id }}"
                                        {{ $student->section_id == $section->id ? 'selected' : '' }}
                                    >
                                        {{ $section->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Student Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ $student->name }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2"
                            >
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium mb-2">
                                Roll Number
                            </label>

                            <input
                                type="text"
                                name="roll_no"
                                value="{{ $student->roll_no }}"
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
                                value="{{ $student->phone }}"
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
                                value="{{ $student->email }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2"
                            >
                        </div>

                    </div>

                    <div class="mt-4">

                        <label class="block text-gray-700 font-medium mb-2">
                            Address
                        </label>

                        <textarea
                            name="address"
                            rows="4"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >{{ $student->address }}</textarea>

                    </div>

                    <div class="mt-6">

                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg"
                        >
                            Update Student
                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

<script>

const sections = @json(\App\Models\Section::all());

document.getElementById('class_id')
.addEventListener('change', function () {

    let classId = this.value;

    let sectionDropdown =
        document.getElementById('section_id');

    sectionDropdown.innerHTML =
        '<option value="">Select Section</option>';

    sections.forEach(function(section) {

        if (section.class_id == classId) {

            sectionDropdown.innerHTML +=
            `<option value="${section.id}">
                ${section.name}
            </option>`;
        }

    });

});

</script>

</x-app-layout>