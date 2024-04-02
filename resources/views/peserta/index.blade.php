@extends('welcome')
@section('main')
    <div class="bg-white border border-gray-200 rounded-lg shadow ">
        <div class="flex items-center justify-between px-5 py-4">
            <div>Tabel Peserta</div>
            <div class="bg-[#6366f1] text-white p-2 rounded-xl hover:bg-[#7c9ae0]">
                <button class=" " data-modal-target="crud-modal" data-modal-toggle="crud-modal">Create</button>
            </div>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lomba
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesertaResources as $peserta)
                        <tr class="bg-white">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $peserta->nama }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $peserta->jenis_kelamin }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $peserta->alamat }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $peserta->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $peserta->lomba }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-between ">
                                    <button data-modal-target="modal-update-{{ $peserta->id }}"
                                        data-modal-toggle="modal-update-{{ $peserta->id }}"
                                        class="p-1 bg-yellow-400 text-black rounded-lg">Edit</button>
                                    <form action="{{ route('peserta-delete', $peserta->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="p-1 bg-red-600 rounded-lg text-white ml-1">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Tambah Peserta
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" id="form_peserta">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                            <input type="text" id="nama" name="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Nama Peserta" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 ">Jenis
                                Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-[51vh] p-2.5">
                                <option selected="">Pilih Jenis Kelamin</option>
                                <option value="LK">LK</option>
                                <option value="PR">PR</option>
                            </select>
                        </div>

                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                placeholder="Input Alamat"></textarea>
                        </div>
                        <div class="col-span-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="text" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Input Email" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 ">Cabang
                                Lomba</label>
                            <select id="lomba" name="lomba"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-[51vh] p-2.5">
                                <option selected="">Pilih Lomba</option>
                                <option value="Futsal">Futsal</option>
                                <option value="Basketball">Basketball</option>
                                <option value="Badminton">Badminton</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" id="kirimData"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambah Peserta
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- update modal -->
    @foreach ($pesertaResources as $peserta)
        <div id="modal-update-{{ $peserta->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-lg font-semibold text-gray-900 ">
                            Tambah Peserta
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-toggle="modal-update-{{ $peserta->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('peserta-update', $peserta->id) }}" method="POST" class="p-4 md:p-5"
                        id="form_peserta">
                        @csrf
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                <input type="text" id="nama" name="nama" value="{{ $peserta->nama }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Nama Peserta" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 ">Jenis
                                    Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-[51vh] p-2.5">
                                    <option selected="">Pilih Jenis Kelamin</option>
                                    <option {{ $peserta->jenis_kelamin === 'LK' ? 'selected' : '' }} value="LK">LK
                                    </option>
                                    <option {{ $peserta->jenis_kelamin === 'PR' ? 'selected' : '' }} value="PR">PR
                                    </option>
                                </select>
                            </div>

                            <div class="col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Alamat</label>
                                <textarea id="alamat" name="alamat" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                    placeholder="Input Alamat">{{ $peserta->alamat }}</textarea>
                            </div>
                            <div class="col-span-2">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="text" name="email" id="email" value="{{ $peserta->email }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Input Email" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 ">Cabang
                                    Lomba</label>
                                <select id="lomba" name="lomba"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-[51vh] p-2.5">
                                    <option selected="">Pilih Lomba</option>
                                    <option {{ $peserta->lomba === 'futsal' ? 'selected' : '' }} value="futsal">Futsal
                                    </option>
                                    <option {{ $peserta->lomba === 'basketball' ? 'selected' : '' }} value="basketball">
                                        Basketball</option>
                                    <option {{ $peserta->lomba === 'badminton' ? 'selected' : '' }} value="badminton">
                                        Badminton</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" id="kirimData"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Tambah Peserta
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var token = "{{ $token }}"
        $(document).ready(function() {
            $("#form_peserta").submit(function(event) {
                event.preventDefault(); // Menghentikan submit form default

                // Mengambil nilai dari input di dalam form
                var formData = {
                    nama: $("#nama").val(),
                    jenis_kelamin: $("#jenis_kelamin").val(),
                    alamat: $("#alamat").val(),
                    email: $("#email").val(),
                    lomba: $("#lomba").val()
                };

                // Mengirim data ke backend menggunakan AJAX
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/peserta/store',
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    headers: {
                        'Authorization': token,
                    },
                    success: function(response) {
                        console.log("Data terkirim:", response);
                        // Handle response

                        // Redirect ke halaman sebelumnya
                        window.location.href = '/peserta';
                    },
                    error: function(xhr, status, error) {
                        console.error("Terjadi kesalahan:", error);
                        // Handle error
                    }
                });
            });
        });
    </script>
@endsection
