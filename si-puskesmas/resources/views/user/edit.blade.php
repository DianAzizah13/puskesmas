<x-dashboard-layout>
    <section class="flex flex-col gap-8">
        <div class="flex gap-2 items-center">
            <a href="{{url()->previous()}}" class="text-xl">Daftar Pengguna</a>
            <p class="text-xl">/</p>
            <p class="text-xl">Ubah Pengguna</p>
        </div>

        <form action="{{route('user.update', $user->id)}}" class="w-80 flex flex-col gap-6" method="POST">
            @csrf
            @method('PUT')
            <div>
                <x-input-label :value="__('Nama Pengguna')" />
                <x-text-input class="block mt-1 w-full" type="text" value="{{$user->name}}" name="name" required/>
            </div>
            <div>
                <x-input-label :value="__('Email Pengguna')" />
                <x-text-input class="block mt-1 w-full" type="email" value="{{$user->email}}" name="email" required/>
            </div>
            <div>
                <x-input-label :value="__('Password Pengguna')" />
                <x-text-input class="block mt-1 w-full" type="password" name="password" required/>
            </div>
            <div>
                <x-input-label :value="__('Role Pengguna')" />
                <select class="block mt-1 w-full border rounded-md" name="role" required>
                    <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                    <option value="apoteker" {{$user->role == 'apoteker' ? 'selected' : ''}}>Apoteker</option>
                    <option value="bendahara" {{$user->role == 'dokter' ? 'selected' : ''}}>Dokter</option>
                </select>
            </div>
            <div>
                <x-bladewind::button can_submit="true" class="w-80 rounded-md text-center mt-6" size="small">Simpan</x-bladewind::button>
            </div>
        </form>
        
    </section>
</x-dashboard-layout>