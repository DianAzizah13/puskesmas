<x-dashboard-layout>
    <section class="flex flex-col gap-8">
        <div class="flex gap-2 items-center">
            <a href="{{url()->previous()}}" class="text-xl">Daftar Poli</a>
            <p class="text-xl">/</p>
            <p class="text-xl">Ubah Poli</p>
        </div>

        <form action="{{route('poli.update', $poli->id)}}" class="w-80 flex flex-col gap-6" method="POST">
            @csrf
            @method('PUT')
            <div>
                <x-input-label :value="__('Nama Poli')" />
                <x-text-input class="block mt-1 w-full" type="text" value="{{$poli->nama_poli}}" name="nama_poli" required/>
            </div>
            <div>
                <x-bladewind::button can_submit="true" class="w-80 rounded-md text-center mt-6" size="small">Simpan</x-bladewind::button>
            </div>
        </form>
        
    </section>
</x-dashboard-layout>