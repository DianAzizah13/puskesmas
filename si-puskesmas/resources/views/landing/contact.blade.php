<x-landing-layout>
    <div class="header">
        <h1 class="text-5xl font-bold">Kontak <span>Kami</span></h1>
    </div>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <p>
            <b>Lokasi</b> : Jl. Sentosa Baru, Sei Kera Hilir I, Kec. Medan
            Perjuangan, Kota Medan, Sumatera Utara 20222
        </p>

        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d995.4852430915732!2d98.69673151447316!3d3.600995394100402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031319f81512e15%3A0xa3b48f89ddb75b53!2sPuskesmas%20Sentosa%20Baru!5e0!3m2!1sid!2sid!4v1717408728030!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

            <form action="{{route('inbox.store')}}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" placeholder="Nama Lengkap" name="nama" class="!w-full" />
                </div>
                <div class="input-group">
                    <input type="email" placeholder="Email" name="email" class="!w-full" />
                </div>
                <div class="input-group">
                    <input type="text" placeholder="No. Telepon" name="telepon" class="!w-full" />
                </div>
                <div class="input-group">
                    <textarea name="pesan" cols="65" rows="5" placeholder="Pesan" class="!w-full"></textarea>
                </div>
                <div class="g-recaptcha mt-4" data-sitekey="{{ config('services.recaptcha.key') }}"></div>
                <div class="input-group !border-none">
                    <button type="submit" class="btn w-full">Kirim Pesan</button>
                </div>
            </form>
        </div>
    </section>
</x-landing-layout>