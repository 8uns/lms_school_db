<!-- main start -->
<div class="ml-0 md:ml-72 sm:ml-0 bg-gray-100 min-h-screen"
    x-data="{ 
                modalsave: false, 
                 }">
    <div class="pl-15 pr-15 pb-15 pt-0">
        <div class="grid grid-cols-1 gap-6">
            <div class="bg-white rounded-2xl border border-gray-100">
                <div class="">

                    <div class="font-bold py-10 px-10 border-b border-gray-200 flex items-center justify-between">
                        <h6>
                            <select
                                x-data
                                @change="if ($event.target.value) window.location.href = $event.target.value">
                                <?php foreach ($data['academic_years'] as $val): ?>
                                    <option <?= $selected = $val['id'] == $academic_year_id ? 'selected' :  '' ?> value="<?= base_url('/admin/rombel-siswa/class/') . $classroom_id . '/ay/' . $val['id'] ?>">Tahun Ajaran <?= $val['year_name'] . ' Semester ' . $val['semester'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </h6>

                        <h1>
                            Kelas <?= $classrooms['class_name'] ?>
                        </h1>
                        <div class="relative">
                            <button @click="modalsave = !modalsave" type="button" class="cursor-pointer bg-gradient-to-r from-blue-600 to-indigo-500 w-full rounded-2xl text-white py-3 px-5 hover:from-blue-700 hover:to-indigo-600 transition-colors">
                                <i class="ri-save-line"></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>

                    <div class="px-10 py-5 ">

                        <div class="overflow-x-auto bg-white border border-gray-400 mt-3 rounded-2xl text-gray-600">
                            <form action="#" method="post">
                                <table class="w-full text-center">
                                    <thead>
                                        <tr class="h-20">
                                            <th class="">No</th>
                                            <th class="">NISN</th>
                                            <th class="">Nama Siswa</th>
                                            <th class="">Tambahkan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <input type="text" name="classroom_id" hidden value="<?= $classrooms['id'] ?>">
                                        <input type="text" name="academic_year_id" hidden value="<?= $classrooms['id'] ?>">
                                        <?php foreach ($data['siswa'] as $val): ?>
                                            <tr class="h-15 border-b border-t border-gray-300">

                                                <td class="px-4 py-2"><?= $no++; ?></td>
                                                <td class="px-4 py-2"><?= $val['username']; ?></td>
                                                <td class="px-4 py-2"><?= $val['full_name']; ?></td>
                                                <td class="px-4 py-2 justify-center">
                                                    <div class="w-auto  text-center justify-center items-center">
                                                        <!-- <input type="checkbox" class=" text-gray-700 inline-block bg-white mr-2.5 items-center text-center "> -->
                                                        <div class="relative flex items-center">
                                                            <input type="checkbox" name="" class="peer appearance-none w-5 h-5 border-2 border-gray-300 rounded-md checked:bg-blue-600 checked:border-blubg-blue-600 hover:border-indigo-400 transition-all duration-200 cursor-pointer" />
                                                            <i class="ri-check-line absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-sm opacity-0 peer-checked:opacity-100 pointer-events-none transition-opacity duration-200"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                                <!-- start modal simpan perubahan-->
                                <div class="fixed inset-0 bg-black/50 z-50" x-cloak x-show="modalsave">
                                    <div class="bg-white w-1/3 mx-auto mt-40 rounded-2xl p-10" @click.outside="modalsave = false">


                                        <div class="flex justify-center text-center">
                                            <h6 class="text-lg mb-5 text-center">
                                                Konfirmasi Simpan Perubahan
                                                <span class="font-bold">
                                                    <?= 'Kelas ' . $classrooms['class_name'] ?>
                                                </span>
                                                ?
                                            </h6>
                                        </div>

                                        <div class="flex justify-around">
                                            <div class="mb-5 relative">
                                                <button
                                                    @click="modalsave = !modalsave"
                                                    type="button" class="cursor-pointer font-bold bg-gradient-to-r from-slate-500 to-slate-400 w-full rounded-2xl text-white py-3 px-10 hover:from-slate-600 hover:to-slate-500 transition-all duration-300 shadow-md hover:shadow-lg active:scale-[0.98]">
                                                    Tidak
                                                </button>
                                            </div>

                                            <div class="mb-5 relative">
                                                <button type="submit" :href="'<?= base_url('/admin/kelas/del') ?>/' + kelas.id" class="block font-bold cursor-pointer bg-gradient-to-r from-cyan-600 to-green-500 w-full rounded-2xl text-white py-3 px-10 hover:from-cyan-700 hover:to-green-600 transition-all duration-300 shadow-md hover:shadow-lg active:scale-[0.98]">
                                                    Ya Simpan
                                                </button>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- end modal simpan perubahan -->
                            </form>

                        </div>



                    </div>



                </div>


            </div>
        </div>
    </div>




</div>
<!-- main end -->