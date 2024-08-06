@extends('perawat.layouts.app')
@section('content')
<section class="content-wrapper">
    <section class="content-header"></section>
    <section class="content">
        @include('perawat.components.headnursingpatient')
        @include('perawat.components.submenunursing')
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <th>
                        Obat Obatan
                    </th>
                    <th>
                        Dosis
                    </th>
                    <th>Frekuensi</th>
                    <th>Cara Pemberian</th>
                    <th>Anti biotik</th>
                    <th>Initial Dokter</th>
                    <th>Verifikasi Farmasi</th>
                    <th>Tanggal/Jam</th>
                    <th>07</th>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <select>
                                <option>IV</option>
                                <option>IM</option>
                                <option>IC</option>
                                <option>SC</option>
                                <option>PO</option>
                                <option>Topical</option>
                                <option>Suppos</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option>P</option>
                                <option>E</option>
                                <option>D</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option>Nama Dokter</option>
                            </select>
                        </td>

                        <td>
                            <select>
                                <option>Nama Nurse</option>
                            </select>
                        </td>
                        <td></td>
                        <td>
                            <select>
                                <option>O</option>
                                <option>T</option>
                                <option>K</option>
                                <option>A</option>
                                <option>ESO</option>
                                <option>TAP</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</section>
@endsection