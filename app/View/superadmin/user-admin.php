<!-- main start -->
<div class="ml-0 md:ml-72 sm:ml-0 bg-gray-100 min-h-screen">
    <div class="p-15">
        <div class="grid grid-cols-1 gap-6">
            <div class="bg-white rounded-2xl border border-gray-100">
                <div class="">

                    <div class="font-bold py-10 px-10 border-b border-gray-200 flex items-center justify-between">
                        <h6>
                            Data User
                        </h6>
                        <div class="mrelative">
                            <button type="button" class="cursor-pointer bg-gradient-to-r from-blue-600 to-indigo-500 w-full rounded-2xl text-white py-3 px-5 hover:from-blue-700 hover:to-indigo-600 transition-colors">
                                <i class="ri-add-large-line"></i>
                                Tambah User
                            </button>
                        </div>

                    </div>

                    <div class="px-10 py-5 ">

                        <div class="overflow-x-auto bg-white border border-gray-400 mt-3 rounded-2xl text-gray-600">
                            <table class="w-full text-center">
                                <thead>
                                    <tr class="h-20">
                                        <th class="">No</th>
                                        <th class="">Nama Lengkap</th>
                                        <th class="">Email</th>
                                        <th class="">Role</th>
                                        <th class="">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data['user'] as $user): ?>
                                        <tr class="h-15 border-b border-t border-gray-300">

                                            <td class="px-4 py-2"><?= $no++; ?></td>
                                            <td class="px-4 py-2"><?= $user['full_name']; ?></td>
                                            <td class="px-4 py-2"><?= $user['username']; ?></td>
                                            <td class="px-4 py-2"><?= $user['role']; ?></td>
                                            <td class="px-4 py-2 flex justify-center gap-2">
                                                <div class="w-auto relative">
                                                    <button type="button" class="cursor-pointer bg-gradient-to-r from-slate-500 to-slate-400 w-full rounded-2xl text-white py-3 px-5 hover:from-slate-600 hover:to-slate-500 transition-all duration-300 shadow-md hover:shadow-lg active:scale-[0.98]">
                                                        <i class="ri-edit-2-line"></i>
                                                    </button>
                                                </div>

                                                <div class="w-auto relative">
                                                    <button type="button" class="cursor-pointer bg-gradient-to-r from-rose-600 to-red-500 w-full rounded-2xl text-white py-3 px-5 hover:from-rose-700 hover:to-red-600 transition-all duration-300 shadow-md hover:shadow-lg active:scale-[0.98]">
                                                        <i class="ri-delete-bin-5-line"></i>
                                                    </button>
                                                </div>


                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>


                    </div>


                </div>
            </div>
        </div>
    </div>

</div>