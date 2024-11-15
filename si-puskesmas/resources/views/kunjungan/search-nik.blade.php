<x-landing-layout>
    <section class="poli">
        <div class="title">
            <h3>Pencarian NIK</h3>
        </div>

        <form method="GET" action="{{route('kunjungan.create')}}" class="mt-12">
            <div class="">
                <x-input-label :value="__('Masukkan Nik Anda')" />
                <x-text-input class="block mt-1 w-full !shadow-md !border-2" maxlength="16" minlength="16" type="text" name="nik" required />
            </div>

            <input value="{{$id_poli}}" name="id_poli" type="hidden" />
            <input value="{{$id_waktu}}" name="id_waktu" type="hidden" />
            <input value="{{$tanggal_kunjungan}}" name="tanggal_kunjungan" type="hidden" />

            <div class="button-container">
                <a class="p-4 text-white bg-red-400 rounded-md py-2 -ml-6" href="{{ url()->previous() }}">Kembali</a>
                <button id="button-next" onclick="goForward()">Lanjut</button>
            </div>
        </form>

    </section>
</x-landing-layout>