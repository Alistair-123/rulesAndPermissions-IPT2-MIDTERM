@extends('layout.layout')

@section('content')
    <div class="w-screen h-screen flex flex-col items-center p-10">
        <h1 class="text-4xl uppercase text-blue-500 font-medium mb-5">Events Page</h1>

        <div class="w-full max-w-4xl">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-blue-500 text-white text-center">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Phone</th>

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
                                    <a href="{{ route('events.edit', $record->id) }}" class="text-blue-500">Edit</a> |
                                    <form action="{{ route('events.destroy', $record->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Delete</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
