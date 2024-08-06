<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa fa-angle-down"></i> Modus Ventilasi
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover mb-3">
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
                            <th>Room Air</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="checkbox" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Nasal Canual</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="checkbox" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Simple Mask</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="checkbox" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Rebrething Mask</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="checkbox" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Non-Rebrething Mask</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="checkbox" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>NIV</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="checkbox" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Ventilator</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="checkbox" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success mb-3"><i class="fa fa-plus"></i> Add Line</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-angle-down"></i> Modus Ventilasi
                </button>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover mb-3">
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
                            <th>SPN-CPAP/PS</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>SPN-CPAP/VS</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>PC-CMV</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>PC-SIMV</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>PC-PSV</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>PC-AC</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>PC-BIPAP</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>PC-PSV</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success mb-3"><i class="fa fa-plus"></i> Add Line</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fa fa-angle-down"></i> Tube Type
                </button>
            </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover mb-3">
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
                            <th>ETT</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="checkbox" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Trach</th>
                            @for ($i = 0; $i < 23; $i++) <td>
                                <input type="checkbox" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>LMA</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="checkbox" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success mb-3"><i class="fa fa-plus"></i> Add Line</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingFour">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fa fa-angle-down"></i> Ventilator
                </button>
            </h2>
        </div>
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover mb-3">
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
                            <th>Ukuran ETT (mm)</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Kendala ETT (mm)</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>FIO2 (%)</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Tidal Volume (ml)</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>PEEP (cmH2O)</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Respiratory Rate (b/min)</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>I:E Ratio</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Pinsp (cmH2O)</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Ti (s)</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Flow (L/min)</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Psupp (cmH2O)</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Slope (s)</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        <tr>
                            <th>Minute Volume (L/min)</th>
                            @for ($i = 0; $i < 24; $i++) <td>
                                <input type="text" style="width:35px">
                            </td>
                            @endfor
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success mb-3"><i class="fa fa-plus"></i> Add Line</button>
            </div>
        </div>
    </div>
</div>
