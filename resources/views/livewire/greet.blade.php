<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
      <div class="p-4 sm:px-10 bg-white border-b border-gray-200">
        <div class="text-center py-10">
          <h1 class="font-semibold text-7xl text-green-500 leading-tight">
            {{ $greet }} Data Success!
          </h1>
          <img src="{{ url('storage/check.png') }}" alt="check" width="200" class="mx-auto">
          <p>Thank you very much for filling out our form.</p>
          <!-- <a class="underline text-md text-gray-600 hover:text-gray-900" href="{{ route('dashboard') }}"> -->
          <button wire:click="index" class="underline text-md text-gray-600 hover:text-gray-900">
              Back to home page!
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
