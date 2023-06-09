@extends('manager.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!--Data Karyawan-->
                <div class="col-lg-4 col-6">
                    @php
                        $count  = DB::table('admins')->whereIn('jabatan', ['Manager', 'Kepala Bagian', 'Operator'])->count();
                    @endphp
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $count }}</h3>
                            <p>DATA KARYAWAN</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-archive"></i>
                        </div>
                        <a href="/manager/karyawandata" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                @php
                    $cutis = DB::table('cutis')
                        ->rightjoin('admins', 'admins.nik', '=', 'cutis.nik')
                        ->where('cutis.vertifikasi_admin', 'Pending')
                        ->where('cutis.approval_manager', 'Pending')
                        ->where('cutis.approval_kabag', 'Approved')
                        ->get();
                    $approve = $cutis->count();
                @endphp
                <!--Approve cuti-->
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$approve }}</h3>
                            <p>Approval Cuti</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-edit"></i>
                        </div>
                        <a href="/manager/vertifikasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!--Laporan Cuti-->
                @php
                    $cuti = DB::select('SELECT * FROM vertifikasis RIGHT JOIN admins ON admins.nik=vertifikasis.nik
							RIGHT JOIN cutis ON cutis.id=vertifikasis.id
                            RIGHT JOIN data_cutis ON data_cutis.id_cuti=vertifikasis.id_cuti
                            WHERE vertifikasis.nik=admins.nik;');
                    $count = count($cuti);
                @endphp
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $count }}</h3>
                                <p>LAPORAN CUTI</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/manager/laporan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-6 connectedSortable">
                    <!-- Visi -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                            <i class="fas fa-rocket mr-5"></i>Visi</h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto"></ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <h2><b> PT.PANARUB INDUSTRY </b></h2>
                                <p style="text-align:justify; font-family:Arial;"><b>Visi adalah pandangan jauh tentang suatu perusahaan ataupun lembaga dan lain-lain, visi juga dapat di artikan sebagai tujuan perusahaan atau lembaga dan apa yang harus dilakukan untuk mencapai tujuannya tersebut pada masa yang akan datang atau masa depan. Adapun Visi PT.Panarub Industry adalah sebagai berikut: “To Be The Best Manufacturer For The Leading Sport Brands In The World“ atau "Menjadi Produsen Terbaik Untuk Merek Olahraga Terkemuka Di Dunia"
                                </b></p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- right col-->
                <section class="col-lg-6 connectedSortable">
                    <!-- Misi card -->
                    <div class="card bg-gradient-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fa fa-hand-holding mr-5"></i>Misi</h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto"></ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <h2><b> PT.PANARUB INDUSTRY </b></h2>
                                <p style="text-align:justify; font-family:Arial;"><b>Misi adalah suatu pernyataan tentang apa yang harus dikerjakan oleh perusahaan atau
                                    lembaga dalam usaha mewujudkan Visi tersebut. Misi perusahaan di artikan sebagai tujuan dan alasan mengapa perusahaan atau lembaga itu dibuat. Misi juga akan memberikan arah sekaligus batasan-batasan proses pencapaian tujuan.
                                <br>
                                Adapun Misi PT.Panarub Industry adalah sebagai berikut:<br>
                                1)  Menghasilkan kualitas produk tertinggi untuk mendukung para atlit.<br>
                                2)  Memproduksi 1,2 juta pasang sepatu perbulan atau 12 juta pasang per tahun.
                                </b></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- /.main content -->
@endsection
