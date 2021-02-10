<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
          <div class="mt-8 text-2xl">
            List of Data
          </div>
          <div class="float-right">
            <a href="{{ route('users.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Add</a>
          </div>
          <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-1 mt-12">
            <table class="border-collapse w-full">
              <thead>
                <tr>
                  <th class="p-3 font-bold bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">#</th>
                  <th class="p-3 font-bold bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Name</th>
                  <th class="p-3 font-bold bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Email</th>
                  <th class="p-3 font-bold bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Date of Birth</th>
                  <th class="p-3 font-bold bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Phone</th>
                  <th class="p-3 font-bold bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Photo</th>
                  <th class="p-3 font-bold bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">#</span>
                    1
                  </td>
                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Name</span>
                    Khafido
                  </td>
                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Email</span>
                    khafido@gmail.com
                  </td>
                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Date of Birth</span>
                    17 August 1998
                  </td>
                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Phone</span>
                    086749388564
                  </td>
                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Phone</span>
                    <img src="{{URL::to('/images/profpic/default.png')}}" alt="profile Pic" height="100" width="100">
                  </td>
                  <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                    <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Edit</a>
                    <a href="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded">Delete</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
