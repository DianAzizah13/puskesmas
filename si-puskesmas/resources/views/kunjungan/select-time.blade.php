<x-landing-layout>
    <form method="GET" action="{{route('kunjungan.search-nik')}}" class="jadwal">
        <h3>Pilih Tanggal dan Waktu Kunjungan</h3>
        <div class="container">
            <div class="circle">
                <i data-feather="calendar"></i>
            </div>
            <p>Jadwal pertama kami:</p>
            <div class="time-box" id="time-box">{{$tanggal[0]->translatedFormat('d F, 08.00')}}</div>
        </div>

        <input type="hidden" value="{{$id_poli}}" name="id_poli" />

        <div class="date-container">
            @foreach($tanggal as $t)
            <div>
                <input type="radio" name="tanggal_kunjungan" class="peer hidden" id="tanggal-{{$loop->iteration}}" value="{{$t}}"/>
                <label for="tanggal-{{$loop->iteration}}" class="p-2 bg-sky-200 date-box peer-disabled:bg-red-200 block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white" id="date-box1">
                    <div class="days">{{$t->dayName}}</div>
                    <div class="date">{{$t->translatedFormat('d')}}</div>
                    <div class="month">{{$t->translatedFormat('F Y')}}</div>
                </label>
            </div>
            @endforeach
        </div>

        <div class="hour px-4">
            <div class="part">
                <p>Waktu Kunjungan</p>
            </div>
            <div class="part">
                <div class="hour-option ">
                    @foreach($waktu as $w)
                    <div>
                        <input type="radio" name="id_waktu" class="peer hidden" id="time-{{$loop->iteration}}" value="{{$w->id}}"/>
                        <label  for="time-{{$loop->iteration}}" class="p-2 peer-disabled:bg-red-200 block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-blue-500 peer-checked:font-bold peer-checked:text-white hour1">{{$w->jam}}</label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="button-container">
            <a class="p-4 text-white bg-red-400 rounded-md py-2 -ml-6" href="{{ url()->previous() }}">Kembali</a>
            <button id="button-next1" class="!disabled:bg-blue-200" onclick="goForward()">Lanjut</button>
        </div>
    </section>
</x-landing-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radio = document.querySelectorAll('input[name="tanggal_kunjungan"]');

        for(const r of radio){
            r.addEventListener('change', updateOptions);
        }   

        function updateOptions() {
            let date = document.querySelector('input[name="tanggal_kunjungan"]:checked').value;

            const today = new Date();
            const yesterday = new Date(today);

            yesterday.setDate(today.getDate() - 1);

            if (new Date(date).getTime() < yesterday.getTime()) {
                document.getElementById('button-next1').setAttribute('disabled', true)
                document.getElementById('button-next1').classList.remove('bg-blue-500')
                document.getElementById('button-next1').classList.add('bg-blue-300')
            } else {
                document.getElementById('button-next1').removeAttribute('disabled')
                document.getElementById('button-next1').classList.add('bg-blue-500')
                document.getElementById('button-next1').classList.remove('bg-blue-300')
            }

            let jam = @json($waktu)

            jam.forEach((j) => {
                document.getElementById('time-' + j.id).removeAttribute('disabled');
                document.getElementById('time-' + j.id).removeAttribute('checked');
            })

            function hasTwentyIdWaktuWithValueOne(timeOptions, val) {
                let count = 0;

                for (let i = 0; i < timeOptions.length; i++) {
                    if (timeOptions[i].id_waktu === val) {
                        count++;
                    }
                }

                return count === 20;
            }

            fetch(`/get-time-options?poli=${@json($id_poli)}&tanggal=${date}`)
                .then(response => response.json())
                .then(data => {
                    data.timeOptions.forEach(option => {
                        if(hasTwentyIdWaktuWithValueOne(data.timeOptions, option.id_waktu)){
                            document.getElementById('time-'+option.id_waktu).setAttribute('disabled', true);
                        }
                    });
                });
        }

        updateOptions();
    });
</script>