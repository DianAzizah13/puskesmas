<x-landing-layout>
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="content">
            <h1 class="font-bold">Pendaftaran Online</h1>
            <p>
                Daftar kunjungan Puskesmas menjadi lebih mudah dan cepat, dapat
                dilakukan dimanapun dan kapanpun, tanpa harus antri
            </p>
            <a href="{{route('kunjungan.select-poli')}}" class="cta">Daftar Sekarang</a>
        </div>
        <div class="hero-image">
            <img src="/images/health.png" alt="Healt Check" />
        </div>
    </section>

    <!-- Service Section -->
    <section class="service" id="home">
        <div class="service-container">
            <!-- Service 1 -->
            <a href="{{route('kunjungan.select-poli')}}" class="service-grid">
                <div class="service-image">
                    <img src="/images/register.png" />
                </div>
                <div class="service-content">
                    <h3 class="text-lg font-bold">Pendaftaran Online</h3>
                    <p>Mendaftar kunjungan Puskesmas secara online dan tanpa antri</p>
                </div>
            </a>

            <!-- Service 2 -->
            <button class="service-grid" onclick="showModal('cek-antrian')">
                <div class="service-image">
                    <img src="/images/queue.png" />
                </div>
                <div class="service-content">
                    <h3 class="text-lg font-bold">Antrian Kunjungan</h3>
                    <p>Cek status antrian secara online</p>
                </div>
            </button>

            <!-- Service 3 -->
            <button class="service-grid" onclick="showModal('cek-resep')">
                <div class="service-image">
                    <img src="/images/medicine.png" />
                </div>
                <div class="service-content">
                    <h3 class="text-lg font-bold">Status Resep</h3>
                    <p>Cek status resep sudah siap atau belum</p>
                </div>
            </button>

            <!-- Service 4 -->
            <div class="service-grid">
                <div class="service-image">
                    <img src="/images/instruction.png" />
                </div>
                <div class="service-content">
                    <h3 class="text-lg font-bold">Pendaftaran Online</h3>
                    <p>
                        Petunjuk untuk melihat langkah-langkah mendaftar di Pendaftaran
                        Online
                    </p>
                </div>
            </div>
        </div>
    </section>

    <x-bladewind::modal backdrop_can_close="false" name="cek-resep" ok_button_label="">

        <form method="get" action="{{route('resep.cek')}}" class="cek-resep">
            @csrf
            <h1 class="text-center p-8 text-xl font-bold">Cek Status Resep</h1>
            <x-bladewind::input class="!w-full" name="antri" label="Nomor Antrian" />
            <x-bladewind::button can_submit="true" class="w-full mt-2">
                Cek Status
            </x-bladewind::button>
        </form>
    </x-bladewind::modal>

    <x-bladewind::modal backdrop_can_close="false" name="cek-antrian" ok_button_label="">

        <form method="get" action="{{route('kunjungan.cek')}}" class="cek-antrian">
            <h1 class="text-center p-8 text-xl font-bold">Cek Antrian</h1>
            <x-bladewind::input class="!w-full" name="antri" label="Nomor Antrian" />
            <x-bladewind::button can_submit="true" class="w-full mt-2">
                Cek Antrian
            </x-bladewind::button>
        </form>
    </x-bladewind::modal>

    @if(isset($antriKode))
    <x-bladewind::table has_border="true" striped="true" celled="true">
        <x-slot name="header">
            <th>Nomor Antrian</th>
            <th>Status</th>
        </x-slot>
        @foreach($antriKode as $d)
        <tr>
            <td>tes</td>
            <td>tes</td>
        </tr>
        @endforeach
    </x-bladewind::table>
    @endif

    <!-- Queue Section -->
    <section class="queue" id="antrian">
        <!-- <div class="queue1">
            <div class="sum-queue">
                <h3 class="text-lg font-bold">No Antrian Saat Ini</h3>
            </div>
        </div> -->

        <div class="queue-container">
            <!-- Poli 1 -->
            @foreach($antri as $key=>$a)
            <div class="queue-grid">
                <div class="queue-content">
                    <h3 class="text-lg font-bold text-center">{{$key}}</h3>

                    <h2 class="mt-6 text-2xl font-bold text-center">{{$a}}</h2>
                </div>
            </div>
            @endforeach


            <!-- Poli 5 -->
            <div class="queue-grid">
                <div class="queue-content">
                    <h3 class="text-lg font-bold text-center">Apotek</h3>

                    <h2 class="mt-6 text-2xl font-bold text-center">{{$apotek ? $apotek->rekamMedis->kunjungan->kode_kunjungan : 'Belum Ada'}}</h2>
                </div>
            </div>
        </div>
    </section>
</x-landing-layout>