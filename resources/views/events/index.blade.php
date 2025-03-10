@extends('layout.layout')

@section('content')
    <div class="w-screen h-screen overflow-auto flex flex-col items-center p-10">
        <h1 class="text-4xl uppercase text-blue-500 font-medium mb-5">Car Collection</h1>

        <button onclick="openModal()" class="bg-green-500 text-white px-4 py-2 rounded mb-4 ">Add Car</button>

        <div id="addModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">Add New Car</h2>

                <form action="{{ route('events.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="block text-gray-700">Car Name:</label>
                        <input type="text" name="name" id="name" class="border rounded p-2 w-full" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="block text-gray-700">Manufacturer:</label>
                        <input type="text" name="email" id="email" class="border rounded p-2 w-full" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="block text-gray-700">Year:</label>
                        <input type="text" name="phone" id="phone" class="border rounded p-2 w-full" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" onclick="closeModal()" class="bg-gray-400 text-white px-4 py-2 rounded mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="w-full max-w-4xl overflow-auto max-h-[500px] border border-gray-300 rounded-lg">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-blue-500 text-white text-center">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Car Name</th>
                        <th class="border border-gray-300 px-4 py-2">Manufacturer</th>
                        <th class="border border-gray-300 px-4 py-2">Year</th>

                        @if(auth()->user()->hasRole('admin'))
                            <th class="border border-gray-300 px-4 py-2">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr class="text-center">
                            <td class="border border-gray-300 px-4 py-2">{{ $record->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $record->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $record->email }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $record->phone }}</td>

                            @if(auth()->user()->hasRole('admin'))
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('events.edit', $record->id) }}" class=" bg-green-500 text-white p-2 rounded">Edit</a>
                                    <form action="{{ route('events.destroy', $record->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" bg-red-500 text-white p-1 rounded">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('addModal').classList.add('hidden');
        }
    </script>
@endsection
