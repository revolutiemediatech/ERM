<label class="label-text font-weight-bold">Golongan Darah</label>
<div class="form-group select-contain w-100">
    <div class="dropdown bootstrap-select select-contain-select">
        <ul class="ms-list d-flex">
            @foreach ($golonganDarah as $gd)
                <li class="ms-list-item pl-4">
                    <label class="ms-checkbox-wrap">
                    <input type="checkbox" name="idMGoldar" value="{{ $gd->id }}">
                    <i class="ms-checkbox-check"></i>
                    </label>
                    <span> {{ $gd->nama }} </span>
                </li>
            @endforeach
        </ul>
        <ul class="ms-list d-flex">
            @foreach ($rhesus as $r)
                <li class="ms-list-item pl-4">
                    <label class="ms-checkbox-wrap">
                    <input type="checkbox" name="idRhesus" value="{{ $r->id }}">
                    <i class="ms-checkbox-check"></i>
                    </label>
                    <span> {{ $r->nama }} </span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<label class="label-text font-weight-bold">Jenis Disabilitas</label>
<div class="form-group select-contain w-100">
    <div class="dropdown bootstrap-select select-contain-select">
        <ul class="ms-list d-flex">
            <li class="ms-list-item pl-4">
                <label class="ms-checkbox-wrap">
                <input type="checkbox" name="jenDis" value="Netra/Buta">
                <i class="ms-checkbox-check"></i>
                </label>
                <span> Netra/Buta </span>
            </li>
            <li class="ms-list-item pl-4">
                <label class="ms-checkbox-wrap">
                <input type="checkbox" name="jenDis" value="Rungu/Tuli">
                <i class="ms-checkbox-check"></i>
                </label>
                <span> Rungu/Tuli </span>
            </li>
            <li class="ms-list-item pl-4">
                <label class="ms-checkbox-wrap">
                <input type="checkbox" name="jenDis" value="Rungu Wicara/Bisu">
                <i class="ms-checkbox-check"></i>
                </label>
                <span> Rungu Wicara/Bisu </span>
            </li>
            <li class="ms-list-item pl-4">
                <label class="ms-checkbox-wrap">
                <input type="checkbox" name="jenDis" value="Grahita/Idiot">
                <i class="ms-checkbox-check"></i>
                </label>
                <span> Grahita/Idiot </span>
            </li>
        </ul>
        <ul class="ms-list d-flex">
            <li class="ms-list-item pl-4">
                <label class="ms-checkbox-wrap">
                <input type="checkbox" name="jenDis" value="Autisme">
                <i class="ms-checkbox-check"></i>
                </label>
                <span> Autisme </span>
            </li>
            <li class="ms-list-item pl-4">
                <label class="ms-checkbox-wrap">
                <input type="checkbox" name="jenDis" value="Daksa/Cacat Fisik">
                <i class="ms-checkbox-check"></i>
                </label>
                <span> Daksa/Cacat Fisik </span>
            </li>
            <li class="ms-list-item pl-4">
                <label class="ms-checkbox-wrap">
                <input type="checkbox" name="jenDis" value="Ganda">
                <i class="ms-checkbox-check"></i>
                </label>
                <span> Ganda </span>
            </li>
            <li class="ms-list-item pl-4">
                <label class="ms-checkbox-wrap">
                <input type="checkbox" name="jenDis" value="ADHD / Sulit Fokus">
                <i class="ms-checkbox-check"></i>
                </label>
                <span> ADHD / Sulit Fokus </span>
            </li>
        </ul>
    </div>
</div>
<label class="label-text font-weight-bold">Riwayat Imunisasi Dasar<span class="text-danger">*</span></label>
<div class="form-group select-contain w-100">
    <div class="dropdown bootstrap-select select-contain-select">
        <ul class="ms-list d-flex">
            <li class="ms-list-item pl-4">
                <label class="ms-checkbox-wrap">
                <input type="radio" name="riwImDas" value="Lengkap">
                <i class="ms-checkbox-check"></i>
                </label>
                <span> Lengkap </span>
            </li>
            <li class="ms-list-item pl-4">
                <label class="ms-checkbox-wrap">
                <input type="radio" name="riwImDas" value="Tidak Lengkap">
                <i class="ms-checkbox-check"></i>
                </label>
                <span> Tidak Lengkap </span>
            </li>
        </ul>
    </div>
</div>