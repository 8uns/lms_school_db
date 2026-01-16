<!-- main start -->
<div class="ml-0 md:ml-72 sm:ml-0 bg-gray-100 min-h-screen">
    <div class="p-15">
        <div class="grid grid-cols-1 gap-6">
            <div class="bg-white rounded-md border border-gray-100">
                <div class="">

                    <div class="font-bold py-10 px-10 border-b border-gray-200">
                        Data User Admindarken
                    </div>

                    <div class="px-10 py-5">

                        <table class="w-full text-center bg-white border border-gray-300 table-auto">
                            <thead>
                                <tr class="border-b border-gray-600 h-20">
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data['user'] as $user): ?>
                                    <tr>

                                        <td class="px-4 py-2"><?= $no++; ?></td>
                                        <td class="px-4 py-2"><?= $user['full_name']; ?></td>
                                        <td class="px-4 py-2"><?= $user['username']; ?></td>
                                        <td class="px-4 py-2"><?= $user['role']; ?></td>
                                        <td class="px-4 py-2">
                                            <button type="button"
                                                class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600">Edit</button>
                                            <button type="button"
                                                class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600"
                                                onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
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