<x-app-layout>
  <div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-4 sm:px-10 bg-white border-b border-gray-200">
          <form action="{{ route('createUser') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="bg-white">
              <div class="text-2xl">
                User Data
              </div><br>
              <div class="">
                <div class="mb-4">
                  <label for="formName" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                  <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formName" name="name" id="required">
                  @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                  <label for="formEmail" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                  <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formEmail" name="email" id="required">
                  @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                  <label for="formEmail" class="block text-gray-700 text-sm font-bold mb-2">Birth:</label>
                  <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formBirth" name="birth" id="required">
                  @error('birth') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                  <label for="formPhone" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>
                  <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formPhone" name="phone" id="required">
                  @error('phone') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                  <label for="formStatus" class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
                  <select name="gender" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="required">
                    <option value="">Gender</option>
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                  </select>
                  @error('gender') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
                <div class="mb-4">
                  <label for="formEmail" class="block text-gray-700 text-sm font-bold mb-2">Photo:</label>
                  <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formPhoto" name="photo" id="required">
                  @error('photo') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>
              </div>
            </div>

            <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-8 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 md:text-md sm:leading-5">
                  Save
                </button>
              </span>
              <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                <button type="reset" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-8 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 md:text-md sm:leading-5">
                  Reset
                </button>
              </span>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>
