@switch($status_menu)
    @case('dalam_proses')
        <span class="badge bg-primary">Dalam Proses</span>
    @break
    @case('akan_jatuh_tempo')
        <span class="badge bg-warning text-dark">Akan Jatuh Tempo</span>
    @break
    @case('jatuh_tempo')
        <span class="badge bg-danger">Jatuh Tempo</span>
    @break
    @case('diperpanjang')
        <span class="badge bg-info">Diperpanjang</span>
    @break
    @case('selesai')
        <span class="badge bg-success">Selesai</span>
    @break
@endswitch
