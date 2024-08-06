{{-- Whole Blood, Packet Red Cells, Liquid Plasma, Fresh Frozen Plasma, Thrombocyt Concentrate, Cryoprecipitate --}}
<div class="modal" tabindex="-1" role="dialog" id="addJenisModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="text-transform:capitalize">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('perawat.patient.add_fluid_balance') }}" method="POST">
                @csrf
                <input type="hidden" value="{{$registrationInap->reg_no}}" name="reg_no">
                <input type="hidden" value="" name="intake">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <input type="text" id="jenis" name="jenis" placeholder="Masukkan Jenis" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa fa-angle-down"></i> In Take - Transfusi (ml)
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover mb-3" id="transfusiTable" style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>07</th>
                            <th>08</th>
                            <th>09</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>01</th>
                            <th>02</th>
                            <th>03</th>
                            <th>04</th>
                            <th>05</th>
                            <th>06</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $arrayKumulatifIntake=array();
                        @endphp
                        @foreach ($transfusi as $item)
                            <tr data-intake="{{ $item->jenis }}" data-id={{ $item->id }}>
                                <th>{{ $item->jenis }}</th>
                                @php
                                    $data = [];

                                    if(count($item->fluid_balance_data)>0){
                                    $data = json_decode($item->fluid_balance_data[0]->data);
                                    }
                                @endphp
                                @for ($i=0;$i<24;$i++) <td class="data">
                                    <input data-key="{{ $i }}" type="text" style="width:35px" value="{{ isset($data[$i]) ? $data[$i] : "" }}">
                                </td>
                                    @php
                                        if(isset($arrayKumulatifIntake[$i])){
                                            $arrayKumulatifIntake[$i]+=!empty($data[$i]) ? $data[$i] : 0;
                                        }else{
                                            $arrayKumulatifIntake[$i]=!empty($data[$i]) ? $data[$i] : 0;
                                        }


                                    @endphp
                                @endfor
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <button class="btn btn-success mb-3 btnAddJenis" data-jenis="transfusi"><i class="fa fa-plus"></i> Add Line</button>

                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover " style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>07</th>
                            <th>08</th>
                            <th>09</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>01</th>
                            <th>02</th>
                            <th>03</th>
                            <th>04</th>
                            <th>05</th>
                            <th>06</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Jumlah 1 Jam Kumulatif</th>
                            @if(count($arrayKumulatifIntake)>0)
                                @for ($i = 0; $i < 24; $i++)
                                    <td>
                                        {{$arrayKumulatifIntake[$i]}}
                                    </td>

                                @endfor
                            @endif

                        </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success" id="btnSaveTransfusi">Save</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fa fa-angle-down"></i> In Take - Makan
                </button>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover mb-3" id="makanTable" style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>07</th>
                            <th>08</th>
                            <th>09</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>01</th>
                            <th>02</th>
                            <th>03</th>
                            <th>04</th>
                            <th>05</th>
                            <th>06</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $arrayKumulatifMakan=array();
                        @endphp
                        @foreach ($makan as $item)
                            <tr data-intake="{{ $item->jenis }}" data-id={{ $item->id }}>
                                <th>{{ $item->jenis }}</th>
                                @php
                                    $data = [];
                                    if(count($item->fluid_balance_data)>0){
                                    $data = json_decode($item->fluid_balance_data[0]->data);
                                    }
                                @endphp
                                @for ($i=0;$i<24;$i++) <td class="data">
                                    <input data-key="{{ $i }}" type="text" style="width:35px" value="{{ isset($data[$i]) ? $data[$i] : "" }}">
                                </td>
                                @php
                                    if(isset($arrayKumulatifMakan[$i])){
                                        $arrayKumulatifMakan[$i]+=!empty($data[$i]) ? $data[$i] : 0;
                                    }else{
                                        $arrayKumulatifMakan[$i]=!empty($data[$i]) ? $data[$i] : 0;
                                    }


                                @endphp
                                @endfor
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success mb-3 btnAddJenis" data-jenis="makan"><i class="fa fa-plus"></i> Add Line</button>

                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover" style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>07</th>
                            <th>08</th>
                            <th>09</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>01</th>
                            <th>02</th>
                            <th>03</th>
                            <th>04</th>
                            <th>05</th>
                            <th>06</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Jumlah 1 Jam Kumulatif</th>
                            @if(count($arrayKumulatifMakan)>0)
                                @for ($i = 0; $i < 24; $i++)
                                    <td>
                                        {{$arrayKumulatifMakan[$i]}}
                                    </td>

                                @endfor
                            @endif
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success" id="btnSaveMakan">Save</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <i class="fa fa-angle-down"></i> In Take - Parental
                </button>
            </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover mb-3" id="parentalTable" style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>07</th>
                            <th>08</th>
                            <th>09</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>01</th>
                            <th>02</th>
                            <th>03</th>
                            <th>04</th>
                            <th>05</th>
                            <th>06</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $arrayKumulatifParental=array();
                        @endphp
                        @foreach ($parental as $item)
                            <tr data-intake="{{ $item->jenis }}" data-id={{ $item->id }}>
                                <th>{{ $item->jenis }}</th>
                                @php
                                    $data = [];
                                    if(count($item->fluid_balance_data)>0){
                                    $data = json_decode($item->fluid_balance_data[0]->data);
                                    }
                                @endphp

                                @for ($i=0;$i<24;$i++) <td class="data">
                                    <input data-key="{{ $i }}" type="text" style="width:35px" value="{{ isset($data[$i]) ? $data[$i] : "" }}">
                                </td>

                                @php
                                    if(isset($arrayKumulatifParental[$i])){
                                        $arrayKumulatifParental[$i]+=!empty($data[$i]) ? $data[$i] : 0;
                                    }else{
                                        $arrayKumulatifParental[$i]=!empty($data[$i]) ? $data[$i] : 0;
                                    }


                                @endphp
                                @endfor
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <button class="btn btn-success mb-3 btnAddJenis" data-jenis="parental"><i class="fa fa-plus"></i> Add Line</button>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover" style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>07</th>
                            <th>08</th>
                            <th>09</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>01</th>
                            <th>02</th>
                            <th>03</th>
                            <th>04</th>
                            <th>05</th>
                            <th>06</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Jumlah 1 Jam Kumulatif</th>
                            @if(count($arrayKumulatifParental)>0)
                                @for ($i = 0; $i < 24; $i++)
                                    <td>
                                        {{$arrayKumulatifParental[$i]}}
                                    </td>
                                @endfor
                            @endif

                        </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success" id="btnSaveParental">Save</button>

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFour">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <i class="fa fa-angle-down"></i> In Take - Komulatif
                </button>
            </h2>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
            <div class="card-body">
                <table class="table table-sm table-bordered table-hover table-responsive">
                    <thead>
                    <tr>
                        <th></th>
                        <th>07</th>
                        <th>08</th>
                        <th>09</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                        <th>13</th>
                        <th>14</th>
                        <th>15</th>
                        <th>16</th>
                        <th>17</th>
                        <th>18</th>
                        <th>19</th>
                        <th>20</th>
                        <th>21</th>
                        <th>22</th>
                        <th>23</th>
                        <th>24</th>
                        <th>01</th>
                        <th>02</th>
                        <th>03</th>
                        <th>04</th>
                        <th>05</th>
                        <th>06</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>Jumlah 1 Jam Kumulatif</th>

                        @for ($i = 0; $i < 24; $i++)
                            <td>
                                @php
                                    $komulatifIntake=!empty($arrayKumulatifIntake[$i]) ? $arrayKumulatifIntake[$i] : 0;
                                    $komulatifMakan=!empty($arrayKumulatifMakan[$i])?$arrayKumulatifMakan[$i]:0;
                                    $komulatifParental=!empty($arrayKumulatifParental[$i])?$arrayKumulatifParental[$i]:0;
                                    $totalKomulatif=$komulatifIntake+$komulatifMakan+$komulatifParental;
                                    echo $totalKomulatif;
                                @endphp
                            </td>
                        @endfor
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFive">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    <i class="fa fa-angle-down"></i> Output
                </button>
            </h2>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover mb-3" id="outputTable" style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>07</th>
                            <th>08</th>
                            <th>09</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>01</th>
                            <th>02</th>
                            <th>03</th>
                            <th>04</th>
                            <th>05</th>
                            <th>06</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $arrayKumulatifOutput=array();
                        @endphp
                        @foreach ($output as $item)
                            <tr data-intake="{{ $item->jenis }}" data-id={{ $item->id }}>
                                <th>{{ $item->jenis }}</th>
                                @php
                                    $data = [];
                                    if(count($item->fluid_balance_data)>0){
                                    $data = json_decode($item->fluid_balance_data[0]->data);
                                    }
                                @endphp
                                @for ($i=0;$i<24;$i++) <td class="data">
                                    <input data-key="{{ $i }}" type="text" style="width:35px" value="{{ isset($data[$i]) ? $data[$i] : "" }}">
                                </td>

                                @php
                                    if(isset($arrayKumulatifOutput[$i])){
                                        $arrayKumulatifOutput[$i]+=!empty($data[$i]) ? $data[$i] : 0;
                                    }else{
                                        $arrayKumulatifOutput[$i]=!empty($data[$i]) ? $data[$i] : 0;
                                    }


                                @endphp
                                @endfor
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success mb-3 btnAddJenis" data-jenis="output"><i class="fa fa-plus"></i> Add Line</button>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover" style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>07</th>
                            <th>08</th>
                            <th>09</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>01</th>
                            <th>02</th>
                            <th>03</th>
                            <th>04</th>
                            <th>05</th>
                            <th>06</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>Jumlah 1 Jam Kumulatif</th>
                            @for ($i = 0; $i < 24; $i++)
                                <td>
                                    {{!empty($arrayKumulatifOutput[$i])?$arrayKumulatifOutput[$i]:0}}
                                </td>
                            @endfor
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success" id="btnSaveOutput">Save</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingSix">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    <i class="fa fa-angle-down"></i> Fluid Balance
                </button>
            </h2>
        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover mb-3" id="fluidBalanceTable" style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>07</th>
                            <th>08</th>
                            <th>09</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>01</th>
                            <th>02</th>
                            <th>03</th>
                            <th>04</th>
                            <th>05</th>
                            <th>06</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($fluid_balance as $item)
                            <tr data-intake="{{ $item->jenis }}" data-id={{ $item->id }}>
                                <th>{{ $item->jenis }}</th>
                                @php
                                    $data = [];
                                    if(count($item->fluid_balance_data)>0){
                                    $data = json_decode($item->fluid_balance_data[0]->data);
                                    }
                                @endphp

                                @for ($i=0;$i<24;$i++)
                                    <td class="data">
{{--                                    <input data-key="{{ $i }}" type="text" style="width:35px" value="{{ isset($data[$i]) ? $data[$i] : "" }}">--}}
                                    @php
                                        $totalKomulatif=$arrayKumulatifIntake[$i]+$arrayKumulatifMakan[$i]+$arrayKumulatifParental[$i];
                                        $iwl=15*165/24;

                                        $fluidBalance=$totalKomulatif-$arrayKumulatifOutput[$i]+$iwl;
                                        echo $fluidBalance;
                                    @endphp

                                </td>

                                @endfor
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success mb-3 btnAddJenis" data-jenis="fluid_balance"><i class="fa fa-plus"></i> Add Line</button>
                <br>
                <button class="btn btn-success" id="btnSaveFluidBalance">Save</button>
            </div>
        </div>
    </div>
</div>

@push('addon-script')
    <script>
        $(function(){
            $(".btnAddJenis").on('click',function(){
                $("#addJenisModal").find(".modal-title").html($(this).data('jenis'))
                $("#addJenisModal").find("input[name=intake]").val($(this).data('jenis'))
                $("#addJenisModal").modal('show')
            })

            $("#btnSaveTransfusi").on('click',function(){
                addFluidBalanceData("#transfusiTable")
            })

            $("#btnSaveMakan").on('click',function(){
                addFluidBalanceData("#makanTable")
            })

            $("#btnSaveParental").on('click',function(){
                addFluidBalanceData("#parentalTable")
            })

            $("#btnSaveOutput").on('click',function(){
                addFluidBalanceData("#outputTable")
            })

            $("#btnSaveFluidBalance").on('click',function(){
                addFluidBalanceData("#fluidBalanceTable")
            })


            const addFluidBalanceData = (table) => {
                const promises = []
                $(table).find("tbody").children().each(function(a,b){
                    const fluid_balance_id = $(b).data("id")
                    const data = $(b).children().filter(".data").map((i,item)=>{
                        return $(item).find("input").val()
                    }).toArray()
                    let request = $.ajax({
                        url : "{{ route('perawat.patient.add_fluid_balance_data') }}",
                        method : "POST",
                        data : {
                            fluid_balance_id : fluid_balance_id,
                            data : JSON.stringify(data),
                            _token : "{{ csrf_token() }}"
                        },

                    })
                    promises.push(request)
                })
                $.when.apply(null,promises).done(function(){
                    window.location.reload()
                })
            }
        })
    </script>
@endpush
