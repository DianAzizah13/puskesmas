<x-landing-layout>
    <section class="poli">
        <div class="title">
            <h3>Pilih Poli/Klinik Puskesmas Sentosa Baru</h3>
        </div>
        <div class="poli-option">
            <div class="poli-container">
                <!-- Poli 1 -->
                 @foreach($poli as $p)
                <a class="poli-grid" href="{{route('kunjungan.select-time', $p->id)}}">
                    <div class="poli-image">
                        <img src="/images/doctor.png" />
                    </div>
                    <div class="poli-content">
                        <h3>{{$p->nama_poli}}</h3>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="button-container">
            <a class="p-4 text-white bg-red-400 rounded-md py-2 -ml-6" href="{{route('landing.home')}}">Kembali</a>
        </div>
    </section>
</x-landing-layout>