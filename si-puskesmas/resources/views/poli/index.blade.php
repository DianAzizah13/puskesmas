<x-dashboard-layout>
    <section class="flex flex-col gap-4">
        <h1 class="text-xl">Daftar Poli</h1>

        <div class="justify-between flex mt-6">
            <form method="GET" action="{{route('poli.index')}}">
                <x-text-input class="block w-full" type="text" name="query" placeholder="Cari Data..."/>
            </form>
            <x-bladewind::button href="{{route('poli.create')}}" class="w-60 rounded-md text-center" size="small" tag="a">Tambah Poli</x-bladewind::button>

        </div>

        <div class="border shadow-lg">
            
            <x-bladewind::table has_border="true" striped="true" celled="true">
                <x-slot name="header">
                    <th>No</th>
                    <th>Nama Poli</th>
                    <th>Aksi</th>
                </x-slot>
                @foreach($data as $d)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$d->nama_poli}}</td>
                    <td class="inline-flex items-center gap-2 w-full">
                        <x-bladewind::button tag="a" class="inline-flex items-center p-2 px-3 text-center rounded-md" href="{{ route('poli.edit', $d->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                <path fill="currentColor" d="m7 17.013l4.413-.015l9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583zM18.045 4.458l1.589 1.583l-1.597 1.582l-1.586-1.585zM9 13.417l6.03-5.973l1.586 1.586l-6.029 5.971L9 15.006z" />
                                <path fill="currentColor" d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2" />
                            </svg>
                        </x-bladewind::button>
                        <form action="{{ route('poli.destroy', $d->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-bladewind::button can_submit="true" color="red" class="inline-flex items-center p-2 px-3 text-center rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
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