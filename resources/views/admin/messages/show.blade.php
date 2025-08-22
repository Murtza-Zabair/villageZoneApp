<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Message Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <div class="border-b pb-4 mb-4">
                        <h3 class="text-lg font-semibold">{{ $message->subject }}</h3>
                        <div class="flex items-center justify-between mt-2 text-sm text-gray-600">
                            <div>
                                <strong>From:</strong> {{ $message->name }} ({{ $message->email }})
                                @if($message->user)
                                - <span class="text-blue-600">Registered User</span>
                                @endif
                            </div>
                            <div>
                                <strong>Date:</strong> {{ $message->created_at->format('M d, Y H:i') }}
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h4 class="font-semibold mb-2">Message:</h4>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            {!! nl2br(e($message->message)) !!}
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('admin.messages.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            Back to Messages
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>