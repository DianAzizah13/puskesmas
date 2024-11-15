<x-dashboard-layout>
    <section class="flex flex-col gap-8">
        <div class="flex gap-2 items-center">
            <a href="{{url()->previous()}}" class="text-xl">Daftar Pengguna</a>
            <p class="text-xl">/</p>
            <p class="text-xl">Tambah Pengguna</p>
        </div>

        <form action="{{route('user.store')}}" class="w-80 flex flex-col gap-6" method="POST">
            @csrf
            <div>
                <x-input-label :value="__('Nama Pengguna')" />
                <x-text-input class="block mt-1 w-full" type="text" name="name" required/>
            </div>
            <div>
                <x-input-label :value="__('Email Pengguna')" />
                <x-text-input class="block mt-1 w-full" type="email" name="email" required/>
            </div>
            <div>
                <x-input-label :value="__('Password Pengguna')" />
                <x-text-input class="block mt-1 w-full" type="password" name="password" required/>
            </div>
            <div>
                <x-input-label :value="__('Role Pengguna')" />
                <select class="block mt-1 w-full border rounded-md" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="apoteker">Apoteker</option>
                    <option value="dokter">Dokter</option>
                </select>
            </div>
            <div>
                <x-bladewind::button can_submit="true" class="w-80 rounded-md text-center mt-6" size="small">Simpan</x-bladewind::button>
            </div>
        </form>
        
    </section>
</x-dashboard-layout>