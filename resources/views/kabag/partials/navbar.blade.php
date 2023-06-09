            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="/" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Notifications Dropdown Menu -->
                {{-- @php
                    $cutis = DB::table('cutis')
                    ->rightjoin('admins', 'admins.nik', '=', 'cutis.nik')
                    ->where('cutis.approval_kabag', 'Pending')
                    ->get();
                    $approve = $cutis->count();
                @endphp
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="/">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">{{ $approve }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="/kabag/vertifikasi" class="dropdown-item">
                            <i class="fas fa-edit mr-2"></i> Approval Cuti
                            <span class="float-right text-muted text-sm">{{ $approve }}</span>
                        </a>
                    </div>
                </li> --}}

                @php
                    use App\Models\User;
                    use App\Models\Admin;
                    // Mendapatkan data user yang sedang login
                    $user = User::find(Auth::id());

                    // Join database user dengan data-karyawan menggunakan relasi
                    $admins2 = Admin::where('nik', $user->nik)->first();
                @endphp
                @if($admins2)
                    <!-- User -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown">
                            <i class="far fa-user"></i> {{ $admins2->jabatan }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">{{ $admins2->name }}</span>
                            <div class="dropdown-divider"></div>
                                <a href="/kabag/profil" class="dropdown-item">
                                    <i class="fas fa-user mr-3"></i> My Profile
                                </a>
                            <div class="dropdown-divider"></div>
                            <a href="#ubahpassword" class="dropdown-item" data-toggle="modal">
                                <i class="fas fa-key mr-3"></i> Change Password
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="/logout" class="dropdown-item">
                                <i class="fas fa-sign-out-alt mr-3"></i> Logout
                            </a>
                        </div>
                    </li>
                @endif
            </ul>
