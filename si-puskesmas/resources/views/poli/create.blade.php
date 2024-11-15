<x-dashboard-layout>
    <section class="flex flex-col gap-8">
        <div class="flex gap-2 items-center">
            <a href="{{url()->previous()}}" class="text-xl">Daftar Poli</a>
            <p class="text-xl">/</p>
            <p class="text-xl">Tambah Poli</p>
        </div>

        <form action="{{route('poli.store')}}" class="w-80 flex flex-col gap-6" method="POST">
            @csrf
            <div>
                <x-input-label :value="__('Nama Poli')" />
                <x-text-input class="block mt-1 w-full" type="text" name="nama_poli" required/>
            </div>
            <div>
                <x-bladewind::button can_submit="true" class="w-80 rounded-md text-center mt-6" size="small">Simpan</x-bladewind::button>
            </div>
        </form>
        
    </section>
</x-dashboard-layout>