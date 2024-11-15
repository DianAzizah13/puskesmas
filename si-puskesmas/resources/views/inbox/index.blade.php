<x-dashboard-layout>
    <section class="flex flex-col gap-4">
        <h1 class="text-xl">Daftar Pesan Kontak</h1>

        <div class="border shadow-lg">
            <x-bladewind::table has_border="true" striped="true" celled="true">
                <x-slot name="header">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </x-slot>
                @foreach($data as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->nama}}</td>
                    <td>{{$d->email}}</td>
                    <td>{{$d->telepon}}</td>
                    <td>{{$d->pesan}}</td>
                    <td class="inline-flex items-center gap-2 w-full">
                        <form action="{{ route('inbox.destroy', $d->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-bladewind::button can_submit="true" color="red"
                                class="inline-flex items-center p-2 px-3 text-center rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
                                </svg>
                            </x-bladewind::button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </x-bladewind::table>
        </div>
    </section>
</x-dashboard-layout>