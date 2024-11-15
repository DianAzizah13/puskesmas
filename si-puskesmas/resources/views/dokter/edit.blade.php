<x-dashboard-layout>
    <section class="flex flex-col gap-8">
        <div class="flex gap-2 items-center">
            <a href="{{url()->previous()}}" class="text-xl">Daftar Pokter</a>
            <p class="text-xl">/</p>
            <p class="text-xl">Ubah Pokter</p>
        </div>

        <form action="{{route('dokter.update', $dokter->id)}}" class="w-80 flex flex-col gap-6" method="POST">
            @csrf
            @method('PUT')
            
            <div>
                <x-input-label :value="__('Nama')" />
                <x-text-input class="block mt-1 w-full" type="text" value="{{$dokter->user->name}}" name="name" required/>
            </div>
            <div>
                <x-input-label :value="__('Email')" />
                <x-text-input class="block mt-1 w-full" type="email" value="{{$dokter->user->email}}" name="email" required/>
            </div>
            <div>
                <x-input-label :value="__('No. Telepon')" />
                <x-text-input class="block mt-1 w-full" type="number" value="{{$dokter->telepon}}" name="telepon" required/>
            </div>
            <div>
                <x-input-label :value="__('NIP')" />
                <x-text-input class="block mt-1 w-full" type="number" value="{{$dokter->nip}}" name="nip" required/>
            </div>
            <div>
                <x-input-label :value="__('Poli')" />
                <select class="block mt-1 w-full border rounded-md" name="id_poli" required>
                    @foreach($poli as $p)
                        <option value="{{$p->id}}" {{$dokter->id_poli == $p->id ? 'selected' : ''}}>{{$p->nama_poli}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <x-input-label :value="__('Password')" />
                <x-text-input class="block mt-1 w-full" type="password" name="password"/>
            </div>
            <div>
                <x-bladewind::button can_submit="true" class="w-80 rounded-md text-center mt-6" size="small">Simpan</x-bladewind::button>
            </div>
        </form>
        
    </section>
</x-dashboard-layout>