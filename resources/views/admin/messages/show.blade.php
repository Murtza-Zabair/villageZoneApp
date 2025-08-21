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

                    @if($message->admin_reply)
                    <div class="mb-6 border-t pt-4">
                        <h4 class="font-semibold mb-2">Admin Reply:</h4>
                        <div class="bg-blue-50 p-4 rounded-lg">
                            {!! nl2br(e($message->admin_reply)) !!}
                        </div>
                    </div>
                    @endif

                    @if($message->status !== 'replied')
                    <form method="POST" action="{{ route('admin.messages.reply', $message) }}">
                        @csrf
                        <div class="mb-4">
                            <label for="admin_reply" class="block text-sm font-medium text-gray-700 mb-2">
                                Reply to Message:
                            </label>
                            <textarea name="admin_reply" id="admin_reply" rows="6"
                                class="w-full rounded-md border-gray-300 shadow-sm"
                                placeholder="Write your reply here..." required></textarea>
                        </div>
                        <div class="flex justify-between">
                            <a href="{{ route('admin.messages.index') }}"
                                class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                                Back to Messages
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                Send Reply
                            </button>
                        </div>
                    </form>
                    @else
                    <div class="flex justify-between">
                        <a href="{{ route('admin.messages.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                            Back to Messages
                        </a>
                        <span class="px-4 py-2 bg-green-100 text-green-800 rounded-md">
                            Reply Already Sent
                        </span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>