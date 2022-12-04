<x-app-layout>

    @section('judul_tab', 'Dashboard')

    <x-slot name="header">
        <nav class="rounded-md w-full" aria-label="breadcrumb">
            <ol class="list-reset flex">
                <li><a href="" class="text-gray-900">Dashboard</a></li>
            </ol>
        </nav>
    </x-slot>

    <div class="flex w-full">
        <div class="grid grid-cols-1 m-3 w-full">
            <div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 animate-fade-in-up text-white">
                    <a class="hover:text-white" href="list_proses_input">
                        <div
                        class="h-full overflow-hidden rounded-xl bg-gradient-to-r from-blue-500 to-cyan-400 p-3 transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 hover:shadow-lg">
                        <div class="grid grid-cols-2">
                            <div>
                                <h5 class=" ml-3 text-5xl font-bold opacity-100">{{ $jumlahProsesInput }}</h5>
                                <p class=" font-bold text-md">Proses Input</p>
                            </div>
                                <div class="relative grid justify-items-center -right-3 -top-6 h-20 w-20 rounded-xl bg-slate-200/50 shadow-md">
                                    <span class="material-icons-round icon mt-2" style="font-size:60px;">edit_note</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a class="hover:text-white" href="list_proses_verifikasi">
                        <div
                            class="h-full overflow-hidden rounded-xl bg-gradient-to-r from-cyan-400 to-fuchsia-500 p-3 transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 hover:shadow-lg">
                            <div class="grid grid-cols-2">
                                <div>
                                    <h5 class="ml-3 text-5xl font-bold opacity-100">{{ $jumlahProsesVerif }}</h5>
                                    <p class=" font-bold text-md">Proses Verifikasi</p>
                                </div>
                                <div class="relative grid justify-items-center -right-3 -top-6 h-20 w-20 rounded-xl bg-slate-200/50 shadow-md">
                                    <span class="material-icons-round icon mt-3" style="font-size:60px;">fact_check</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a class="hover:text-white" href="list_proses_expose">
                        <div
                            class=" h-full overflow-hidden rounded-xl bg-gradient-to-r from-fuchsia-500 to-indigo-500 p-3 transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 hover:shadow-lg">
                            <div class="grid grid-cols-2">
                                <div>
                                    <h5 class="ml-3 text-5xl font-bold opacity-100">{{ $jumlahProsesExpose }}</h5>
                                    <p class=" font-bold text-md">Proses Expose</p>
                                </div>
                                <div class="relative grid justify-items-center -right-3 -top-6 h-20 w-20 rounded-xl bg-slate-200/50 shadow-md">
                                    <span class="material-icons-round icon mt-3" style="font-size:60px;">spatial_audio_off</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a class="hover:text-white" href="list_proses_tinjau_lapangan">
                        <div
                            class="h-full overflow-hidden rounded-xl bg-gradient-to-r from-indigo-500 to-emerald-400 p-3 transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 hover:shadow-lg">
                            <div class="grid grid-cols-2">
                                <div>
                                    <h5 class="ml-3 text-5xl font-bold opacity-100">{{ $jumlahProsesTinjauLapangan }}</h5>
                                    <p class=" font-bold text-md">Proses Tinjau Lapangan</p>
                                </div>
                                <div class="relative grid justify-items-center -right-3 -top-6 h-20 w-20 rounded-xl bg-slate-200/50 shadow-md">
                                    <span class="material-icons-round icon mt-3" style="font-size:60px;">travel_explore</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a class="hover:text-white" href="list_proses_pemutakhiran">
                        <div
                            class="h-full overflow-hidden rounded-xl bg-gradient-to-r from-orange-500 to-yellow-500 p-3 transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 hover:shadow-lg">
                            <div class="grid grid-cols-2">
                                <div>

                                    <h5 class="ml-3 text-5xl font-bold opacity-100">{{ $jumlahPerluPemutakhiran }}</h5>
                                    <p class=" font-bold text-md">Proses Pemutakhiran</p>
                                </div>
                                <div class="relative grid justify-items-center -right-3 -top-6 h-20 w-20 rounded-xl bg-slate-200/50 shadow-md">
                                    <span class="material-icons-round icon mt-3" style="font-size:60px;">pending_actions</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a class="hover:text-white" href="list_proses_draft_surat">
                        <div
                            class="h-full overflow-hidden rounded-xl bg-gradient-to-r from-emerald-400 to-lime-400 p-3 transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 hover:shadow-lg">
                            <div class="grid grid-cols-2">
                                <div>

                                    <h5 class="ml-3 text-5xl font-bold opacity-100">{{ $jumlahProsesDraftSurat }}</h5>
                                    <p class=" font-bold text-md">Proses Draft Surat</p>
                                </div>
                                <div class="relative grid justify-items-center -right-3 -top-6 h-20 w-20 rounded-xl bg-slate-200/50 shadow-md">
                                    <span class="material-icons-round icon mt-3" style="font-size:60px;">drafts</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a class="hover:text-white" href="list_selesai">
                        <div
                            class="h-full overflow-hidden rounded-xl bg-gradient-to-r from-cyan-500 to-green-400 p-3 transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 hover:shadow-lg">
                            <div class="grid grid-cols-2">
                                <div>

                                    <h5 class="ml-3 text-5xl font-bold opacity-100">{{ $jumlahSelesai }}</h5>
                                    <p class=" font-bold text-md">Selesai</p>
                                </div>
                                <div class="relative grid justify-items-center -right-3 -top-6 h-20 w-20 rounded-xl bg-slate-200/50 shadow-md">
                                    <span class="material-icons-round icon mt-3" style="font-size:60px;">done_all</span>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a class="hover:text-white" href="list_dikembalikan">
                        <div
                            class="h-full overflow-hidden rounded-xl bg-gradient-to-r from-red-700 to-red-400 p-3 transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 hover:shadow-lg">
                            <div class="grid grid-cols-2">
                                <div>

                                    <h5 class="ml-3 text-5xl font-bold opacity-100">{{ $jumlahDikembalikan }}</h5>
                                    <p class=" font-bold text-md">Dikembalikan</p>
                                </div>
                                <div class="relative grid justify-items-center -right-3 -top-6 h-20 w-20 rounded-xl bg-slate-200/50 shadow-md">
                                    <span class="material-icons-round icon mt-3" style="font-size:60px;">assignment_return</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="flex w-full">
        <div class="grid p-6 m-3 border-1 rounded-2xl shadow-md bg-white w-full animate-fade-in-up">
            <div class="text-2xl mb-3">Jumlah Pengajuan Rekomtek</div>

            <div class=" grid grid-cols-1 md:grid-cols-2 gap-3 w-full">
                <div>
                    <canvas id="chartLine" class=" mb-3"></canvas>
                    <canvas id="chartLineMiring"></canvas>
                </div>
                <div>
                    <canvas id="chartDoughnut"></canvas>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>

    <!-- Chart line -->
    <script>
        const jumlahJanuari = {!! json_encode($jumlahJanuari) !!};
        const jumlahFebruari = {!! json_encode($jumlahFebruari) !!};
        const jumlahMaret = {!! json_encode($jumlahMaret) !!};
        const jumlahApril = {!! json_encode($jumlahApril) !!};
        const jumlahMei = {!! json_encode($jumlahMei) !!};
        const jumlahJuni = {!! json_encode($jumlahJuni) !!};
        const jumlahJuli = {!! json_encode($jumlahJuli) !!};
        const jumlahAgustus = {!! json_encode($jumlahAgustus) !!};
        const jumlahSeptember = {!! json_encode($jumlahSeptember) !!};
        const jumlahOktober = {!! json_encode($jumlahOktober) !!};
        const jumlahNovember = {!! json_encode($jumlahNovember) !!};
        const jumlahDesember = {!! json_encode($jumlahDesember) !!};

        const labels = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        const data = {
            labels: labels,
            datasets: [{
                label: "Jumlah Pengajuan Rekomtek",
                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                borderColor: "hsl(252, 82.9%, 67.8%)",
                data: [jumlahJanuari, jumlahFebruari, jumlahMaret, jumlahApril, jumlahMei, jumlahJuni, jumlahJuli, jumlahAgustus, jumlahSeptember, jumlahOktober, jumlahNovember, jumlahDesember],
                pointStyle: 'circle',
                pointRadius: 5,
                pointHoverRadius: 10,
                tension: 0.4
            }, ],
        };

        const configLineChart = {
            type: "line",
            data,
            options: {
                responsive: true,
            },
        };

        var chartLine = new Chart(
            document.getElementById("chartLine"),
            configLineChart
        );
    </script>

    <!-- Chart Bar Miring-->
    <script>
        const jumlahPengusahaanBaru = {!! json_encode($jumlahPengusahaanBaru) !!};
        const jumlahPengusahaanPerpanjangan = {!! json_encode($jumlahPengusahaanPerpanjangan) !!};
        const jumlahPenggunaan = {!! json_encode($jumlahPenggunaan) !!};
        const jumlahSempadan = {!! json_encode($jumlahSempadan) !!};

        const labelBarMiring = ["Pengusahaan Baru", "Pengusahaan Perpanjangan", "Penggunaan", "Sempadan"];
        const dataBarMiring = {
            labels: labelBarMiring,
            datasets: [{
                label: "Jumlah Pengajuan Rekomtek",
                backgroundColor: [
                "#D647EF", "#5fe8e8", "#B2EE64", "#E96A9C"
                ],
                data: [jumlahPengusahaanBaru, jumlahPengusahaanPerpanjangan, jumlahPenggunaan, jumlahSempadan],
            }, ],
        };

        const configLineChartMiring = {
            type: "bar",
            data: dataBarMiring,
            options: {
                responsive: true,
                indexAxis: 'y',
                elements: {
                    bar: {
                        borderWidth: 2,
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                }
            },
        };

        var chartLineMiring = new Chart(
            document.getElementById("chartLineMiring"),
            configLineChartMiring
        );
    </script>

    <!-- Chart doughnut -->
    <script>
        const labelPenggunaanKonstruksi = {!! json_encode($labelPenggunaanKonstruksi) !!};
        const jumlahPenggunaanKonstruksi = {!! json_encode($jumlahPenggunaanKonstruksi) !!};

        const labelPenggunaanDermaga = {!! json_encode($labelPenggunaanDermaga) !!};
        const jumlahPenggunaanDermaga = {!! json_encode($jumlahPenggunaanDermaga) !!};

        const labelPenggunaanPipa = {!! json_encode($labelPenggunaanPipa) !!};
        const jumlahPenggunaanPipa = {!! json_encode($jumlahPenggunaanPipa) !!};

        const labelPenggunaanKebutuhan = {!! json_encode($labelPenggunaanKebutuhan) !!};
        const jumlahPenggunaanKebutuhan = {!! json_encode($jumlahPenggunaanKebutuhan) !!};

        const labelPenggunaanWisata = {!! json_encode($labelPenggunaanWisata) !!};
        const jumlahPenggunaanWisata = {!! json_encode($jumlahPenggunaanWisata) !!};

        const labelPenggunaanPLTMH = {!! json_encode($labelPenggunaanPLTMH) !!};
        const jumlahPenggunaanPLTMH = {!! json_encode($jumlahPenggunaanPLTMH) !!};


        const labelPengusahaanBaruIndustri = {!! json_encode($labelPengusahaanBaruIndustri) !!};
        const jumlahPengusahaanBaruIndustri = {!! json_encode($jumlahPengusahaanBaruIndustri) !!};

        const labelPengusahaanBaruMakanan = {!! json_encode($labelPengusahaanBaruMakanan) !!};
        const jumlahPengusahaanBaruMakanan = {!! json_encode($jumlahPengusahaanBaruMakanan) !!};

        const labelPengusahaanBaruPerhotelan = {!! json_encode($labelPengusahaanBaruPerhotelan) !!};
        const jumlahPengusahaanBaruPerhotelan = {!! json_encode($jumlahPengusahaanBaruPerhotelan) !!};

        const labelPengusahaanBaruPerkebunan = {!! json_encode($labelPengusahaanBaruPerkebunan) !!};
        const jumlahPengusahaanBaruPerkebunan = {!! json_encode($jumlahPengusahaanBaruPerkebunan) !!};

        const labelPengusahaanBaruBUMN = {!! json_encode($labelPengusahaanBaruBUMN) !!};
        const jumlahPengusahaanBaruBUMN = {!! json_encode($jumlahPengusahaanBaruBUMN) !!};

        const labelPengusahaanBaruKemasan = {!! json_encode($labelPengusahaanBaruKemasan) !!};
        const jumlahPengusahaanBaruKemasan = {!! json_encode($jumlahPengusahaanBaruKemasan) !!};

        const labelPengusahaanBaruTransportasi = {!! json_encode($labelPengusahaanBaruTransportasi) !!};
        const jumlahPengusahaanBaruTransportasi = {!! json_encode($jumlahPengusahaanBaruTransportasi) !!};

        const labelPengusahaanBaruKeramba = {!! json_encode($labelPengusahaanBaruKeramba) !!};
        const jumlahPengusahaanBaruKeramba = {!! json_encode($jumlahPengusahaanBaruKeramba) !!};

        const labelPengusahaanBaruPLTA = {!! json_encode($labelPengusahaanBaruPLTA) !!};
        const jumlahPengusahaanBaruPLTA = {!! json_encode($jumlahPengusahaanBaruPLTA) !!};

        const labelPengusahaanBaruPLTM = {!! json_encode($labelPengusahaanBaruPLTM) !!};
        const jumlahPengusahaanBaruPLTM = {!! json_encode($jumlahPengusahaanBaruPLTM) !!};

        const labelPengusahaanBaruPLTMH = {!! json_encode($labelPengusahaanBaruPLTMH) !!};
        const jumlahPengusahaanBaruPLTMH = {!! json_encode($jumlahPengusahaanBaruPLTMH) !!};

        const labelSempadanSungai = {!! json_encode($labelSempadanSungai) !!};
        const jumlahSempadanSungai = {!! json_encode($jumlahSempadanSungai) !!};

        const labelSempadanIrigasi = {!! json_encode($labelSempadanIrigasi) !!};
        const jumlahSempadanIrigasi = {!! json_encode($jumlahSempadanIrigasi) !!};

        const labelSempadanDanau = {!! json_encode($labelSempadanDanau) !!};
        const jumlahSempadanDanau = {!! json_encode($jumlahSempadanDanau) !!};

        const dataDoughnut = {
        labels:
        [labelPenggunaanKonstruksi, labelPenggunaanDermaga, labelPenggunaanPipa, labelPenggunaanKebutuhan, labelPenggunaanWisata, labelPenggunaanPLTMH,

        labelPengusahaanBaruIndustri, labelPengusahaanBaruMakanan, labelPengusahaanBaruPerhotelan, labelPengusahaanBaruPerkebunan, labelPengusahaanBaruBUMN,
        labelPengusahaanBaruKemasan, labelPengusahaanBaruTransportasi, labelPengusahaanBaruKeramba, labelPengusahaanBaruPLTA, labelPengusahaanBaruPLTM, labelPengusahaanBaruPLTMH,

        labelSempadanSungai, labelSempadanIrigasi, labelSempadanDanau,],
        datasets: [
            {
            label: "Jumlah Pengajuan Berdasarkan Tujuan",
            data:
            [jumlahPenggunaanKonstruksi, jumlahPenggunaanDermaga, jumlahPenggunaanPipa, jumlahPenggunaanKebutuhan, jumlahPenggunaanWisata, jumlahPenggunaanPLTMH,

            jumlahPengusahaanBaruIndustri, jumlahPengusahaanBaruMakanan, jumlahPengusahaanBaruPerhotelan, jumlahPengusahaanBaruPerkebunan, jumlahPengusahaanBaruBUMN,
            jumlahPengusahaanBaruKemasan, jumlahPengusahaanBaruTransportasi, jumlahPengusahaanBaruKeramba, jumlahPengusahaanBaruPLTA, jumlahPengusahaanBaruPLTM, jumlahPengusahaanBaruPLTMH,

            jumlahSempadanSungai, jumlahSempadanIrigasi, jumlahSempadanDanau],
            backgroundColor: [
                "#D647EF", "#A455F0", "#7063F1", "#DE51D3", "#E96A9C", "#F38065",
                "#5fe8e8", "#2DB2F2", "#24CBEE", "#24D2EE", "#010080", "#0080FF", "#73C2FB", "#0F52BA", "#008081", "#589FD3", "#B0DFE5",
                "#B2EE64", "#75DD62", "#26C65E"
            ],
            hoverOffset: 4,
            },
        ],
        };

        const configDoughnut = {
            type: "doughnut",
            data: dataDoughnut,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                                // color: "#D647EF",
                                filter: function(legendItem, data) {
                                    if (legendItem.text == null) {
                                        return false;
                                    }
                                return true;
                                }
                        }
                    }
                }
            },
        };

        var chartDoughnut = new Chart(
        document.getElementById("chartDoughnut"),
        configDoughnut,
        );
    </script>
