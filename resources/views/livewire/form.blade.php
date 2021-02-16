<div class="py-12">
  <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
      <div class="p-4 sm:px-10 bg-white border-b border-gray-200">
        <!-- <form wire:submit.prevent="store" enctype="multipart/form-data" method="post"> -->
        <form wire:submit.prevent="store">
          @csrf
          <div class="bg-white">
            <div class="text-2xl">
              User Data
            </div><br>
            <div class="">
              <div class="mb-4">
                <label for="formName" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formName" wire:model="name" required>
                @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                <label for="formEmail" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formEmail" wire:model="email" required>
                @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                <label for="formEmail" class="block text-gray-700 text-sm font-bold mb-2">Birth:</label>
                <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formBirth" wire:model="birth" max="<?=date('Y-m-d')?>" required>
                @error('birth') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                <label for="formPhone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formPhone" wire:model="phone" required>
                @error('phone') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                <label for="formStatus" class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
                <select wire:model="gender" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                  <option value="">Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
                @error('gender') <span class="text-red-500">{{ $message }}</span>@enderror
              </div>
              <div class="mb-4">
                <label for="formEmail" class="block text-gray-700 text-sm font-bold mb-2">Photo:</label>
                <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model="photo" accept="image/x-png,image/jpeg">
                <div>
                  @error('photo') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div wire:loading wire:target="photo" class="text-sm text-gray-500 italic">Uploading...<br/></div>
                <br>
                @if($photo || $live_photo)
                <img src="{{ is_object($photo)?$photo->temporaryUrl():$live_photo }}" alt="profile Pic" height="100" width="100">
                @endif
              </div>
            </div>
          </div>

          <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
              <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-8 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 md:text-md sm:leading-5">
              <!-- <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-8 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 md:text-md sm:leading-5"> -->
                Save
              </button>
            </span>
            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
              <button type="reset" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-8 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 md:text-md sm:leading-5">
                Reset
              </button>
            </span>
            <span class="mt-3 mr-5 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
              <button wire:click="index" class="underline text-md text-gray-600 hover:text-gray-900">
                Back to home page!
              </button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
