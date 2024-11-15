<x-dashboard-layout>
<div class="db-content">
        <h1>Dashboard</h1>
        
        <div class="db-grid">
            <div class="db-container">
                <!-- Box 1 -->
                <div class="box-grid">
                  <div class="box-content">
                    <h4>Total Kunjungan</h4>

                    <h4 class="text-center mt-6 text-4xl font-bold">{{$kunjungan}}</h4>
                  </div>
                </div>
        
                <!-- Box 2 -->
                <div class="box-grid">
                  <div class="box-content">
                    <h4>Total Pasien</h4>
                    
                    <h4 class="text-center mt-6 text-4xl font-bold">{{$pasien}}</h4>
                  </div>
                </div>
        
                <!-- Box 3 -->
                <div class="box-grid">
                  <div class="box-content">
                    <h4>Total Antrian</h4>
                    
                    <h4 class="text-center mt-6 text-4xl font-bold">{{$antrian}}</h4>
                  </div>
                </div>
        </div>
     </div>
</x-dashboard-layout>
