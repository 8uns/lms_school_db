<div class="bg-gradient-to-r  from-orange-700 to-yellow-500  h-screen flex items-center justify-center">
    <div class="bg-white p-10 shadow shadow-black1/2 rounded-2xl w-4xl">
        <h2 class="text-center p-4 font-bold text-2xl mb-8">
            <i class="ri-booklet-line"></i>
            Acount Registration
        </h2>
        <div class="">
            <form action="<?= base_url() ?>/register" method="POST">
                <div class="mb-5 relative">
                    <label class="block text-sm">Username</label>
                    <i class="ri-account-circle-line absolute left-3 top-9 text-gray-400"></i>
                    <input class="border-gray-300 border text-sm rounded-2xl h-15 py-2 pl-9 pr-6 w-full" type="text" name="username" required placeholder="username...">
                </div>
                <div class="mb-5 relative">
                    <label class="block text-sm">Password</label>
                    <i class="ri-lock-password-line absolute left-3 top-9 text-gray-400"></i>
                    <input class="border-gray-300 border text-sm rounded-2xl h-15 py-2 pl-9 pr-6 w-full" type="password" name="password" required placeholder="••••••••">
                </div>


                <div class="mb-5 relative">
                    <label class="block text-sm">Full Name</label>
                    <!-- <i class="ri-account-circle-line absolute left-3 top-9 text-gray-400"></i> -->
                    <i class="ri-id-card-line absolute left-3 top-9 text-gray-400"></i>
                    <input class="border-gray-300 border text-sm rounded-2xl h-15 py-2 pl-9 pr-6 w-full" type="text" name="full_name" required placeholder="full name...">
                </div>

                <div class="mb-5 relative">
                    <label class="block text-sm">Role</label>
                    <!-- <i class="ri-account-circle-line absolute left-3 top-9 text-gray-400"></i> -->
                    <i class="ri-group-line absolute left-3 top-9 text-gray-400"></i>
                    <select name="role" id="" class="border-gray-300 border text-sm rounded-2xl h-15 py-2 pl-9 pr-6 w-full" required>
                        <option value="">Pilih Role</option>
                        <option value="SuperAdmin">SuperAdmin</option>
                        <option value="Admin">Admin</option>
                        <option value="Guru">Guru</option>
                        <option value="Siswa">Siswa</option>
                    </select>
                </div>

                <button type="submit" class="bg-gradient-to-r from-orange-700 to-yellow-500 h-15 w-full rounded-2xl text-white py-2 mt-6">Sign Up</button>
            </form>
        </div>
    </div>
</div>