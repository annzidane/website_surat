<x-app-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <div class="container mx-auto" x-data="{ showPopup: false, selectedData: null }">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Tanggal Pengajuan</th>
                                <th scope="col" class="px-6 py-3">Tipe Surat</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Keterangan</th>
                                <th scope="col" class="px-6 py-3"><span class="sr-only">Action</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $item->created_at->format('d/m/Y') }}</td>
                                <td class="px-6 py-4">Surat Keterangan Kelahiran</td>
                                <td class="px-6 py-4">{{ $item->status }}</td>
                                <td class="px-6 py-4">{{ $item->keterangan }}</td>
                                <td class="px-6 py-4 text-right">
                                    <button 
                                        @click="selectedData = {{ json_encode($item) }}; showPopup = true" 
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                    >
                                        Preview
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Popup Modal -->
                <template x-if="showPopup">
                    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                        <div class="bg-white rounded-lg p-6 w-full max-w-md mx-auto">
                            <h2 class="text-xl font-semibold mb-4">Detail Surat Keterangan Kelahiran</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <div class="mb-4">
                                        <label class="block font-medium text-gray-700">Nama anak</label>
                                        <p x-text="selectedData.nama_anak" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></p>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block font-medium text-gray-700">Ayah</label>
                                        <p x-text="selectedData.nama_ayah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></p>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block font-medium text-gray-700">Ibu</label>
                                        <p x-text="selectedData.nama_ibu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></p>
                                    </div>
                                    <!-- Add more fields as needed -->
                                </div>
                                <div>
                                    <div class="mb-4">
                                        <label class="block font-medium text-gray-700">Nomor Surat</label>
                                        <p x-text="selectedData.nomor_surat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></p>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block font-medium text-gray-700">Status Surat</label>
                                        <p x-text="selectedData.status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></p>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block font-medium text-gray-700">Keterangan</label>
                                        <p x-text="selectedData.keterangan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></p>
                                    </div>
                                    <div class="mb-4" x-show="selectedData.surat_kelahiran">
                                        <label class="block font-medium text-gray-700">Surat</label>
                                        <a :href="'/storage/surat_kelahiran/' + selectedData.surat_kelahiran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-blue-500" download>
                                            Download Surat Keterangan Kelahiran
                                        </a>
                                    </div>
                                    <!-- Add more fields as needed -->
                                    <!-- Add more fields as needed -->
                                    <div class="mt-6 text-right space-x-2">
                                        <button @click="showPopup = false" class="bg-gray-500 text-white font-bold py-2 px-4 rounded">Close</button>
                                    
                                    </div>
                                </div>
                        
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</x-app-layout>
