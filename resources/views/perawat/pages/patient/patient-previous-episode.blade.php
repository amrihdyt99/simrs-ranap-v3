@extends('perawat.layouts.app')
@section('content')
   <section class="content-wrapper">
       <section class="content-header"></section>
       <section class="content">
       @include('perawat.components.headpatientsummary')

       @include('dokter.components.head-patient-regist-info')
       <!-- general form elements -->
           <div class="card card-primary">
               <div class="card-header">
                   <h3 class="card-title">Diagnose</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->

               <div class="card-body">
                   <div class="form-group">
                       <table class="table table-bordered">
                           <thead>
                           <tr>
                               <td>Primary</td>
                               <td>S42.0</td>
                               <td>Fracture of Clavicle</td>
                               <td>Date Time</td>
                           </tr>
                           </thead>
                           <tbody>
                           <tr>
                               <td>&nbsp;</td>
                               <td>&nbsp;</td>
                               <td>&nbsp;</td>
                               <td>&nbsp;</td>
                           </tr>
                           </tbody>
                       </table>
                   </div>

               </div>
           </div>
           <!-- /.card -->

           <div class="card card-primary">
               <div class="card-header">
                   <h3 class="card-title">Laboratory CPOE</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->

               <div class="card-body">
                   <div class="form-group">
                       <div class="row">
                           <div class="col  table-bordered p-2">
                               Hematologi Rutin (HR)
                           </div>
                           <div class="col  table-bordered text-right p-2">
                               Status <br>
                               Date Time
                           </div>

                           <div class="w-100 "></div>

                           <div class="col  table-bordered p-2">
                               Paket Elektrolit (Na, K, Cl)
                           </div>
                           <div class="col  table-bordered text-right p-2">
                               Status <br>
                               Date Time
                           </div>

                           <div class="w-100"></div>

                           <div class="col  table-bordered p-2">
                               SGOT
                           </div>
                           <div class="col  table-bordered text-right p-2">
                               Status <br>
                               Date Time
                           </div>

                           <div class="w-100"></div>

                           <div class="col  table-bordered p-2">
                               SGPT
                           </div>
                           <div class="col  table-bordered text-right p-2">
                               Status <br>
                               Date Time
                           </div>

                           <div class="w-100"></div>

                           <div class="col  table-bordered p-2">
                               Glukosa Sewaktu
                           </div>
                           <div class="col  table-bordered text-right p-2">
                               Status <br>
                               Date Time
                           </div>

                           <div class="w-100"></div>

                           <div class="col  table-bordered p-2">
                               Rapid Antigen
                           </div>
                           <div class="col  table-bordered text-right p-2">
                               Status <br>
                               Date Time
                           </div>
                       </div>

                   </div>

               </div>
           </div>

           <div class="card card-primary">
               <div class="card-header">
                   <h3 class="card-title">Imaging Exam CPOE</h3>
               </div>
               <!-- /.card-header -->
               <!-- form start -->

               <div class="card-body">
                   <div class="row">
                       <div class="col  table-bordered p-2">
                           Thorax AP
                       </div>
                       <div class="col  table-bordered text-right p-2">
                           Status <br>
                           Date Time
                       </div>
                   </div>

               </div>
           </div>

           <!-- general form elements -->
           <div class="card card-primary">
               <!-- /.card-header -->
               <!-- form start -->
               <form>
                   <div class="card-body">
                       <div class="form-group">
                           <label for="exampleInputEmail1">Other Exam CPOE</label>
                           <textarea name="other-exam-cpoe" id="other-exam-cpoe"
                                     class="form-control"></textarea>
                       </div>

                   </div>
                   <!-- /.card-body -->

               </form>
           </div>

           <!-- general form elements -->
           <div class="card card-primary">
               <!-- /.card-header -->
               <!-- form start -->
               <form>
                   <div class="card-body">
                       <div class="form-group">
                           <label for="medication-cpoe">Medication CPOE</label>
                           <textarea name="medication-cpoe" id="medication-cpoe"
                                     class="form-control"></textarea>
                       </div>

                   </div>
                   <!-- /.card-body -->

               </form>
           </div>

           <div class="card card-primary">
               <!-- /.card-header -->
               <!-- form start -->
               <form>
                   <div class="card-body">
                       <div class="form-group">
                           <label for="integrated-notes">Integrated Notes</label>
                           <textarea name="integrated-notes" id="integrated-notes"
                                     class="form-control"></textarea>
                       </div>

                   </div>
                   <!-- /.card-body -->

               </form>
           </div>

           <div class="card card-primary">
               <!-- /.card-header -->
               <!-- form start -->
               <form>
                   <div class="card-body">
                       <div class="form-group">
                           <label for="nursing-notes">Nursing Notes</label>
                           <textarea name="nursing-notes" id="nursing-notes"
                                     class="form-control"></textarea>
                       </div>

                   </div>
                   <!-- /.card-body -->

               </form>
           </div>

           <div class="card card-primary">
               <!-- /.card-header -->
               <!-- form start -->
               <form>
                   <div class="card-body">
                       <div class="form-group">
                           <label for="e-doc-management">e-Doc Management</label>
                           <textarea name="e-doc-management" id="e-doc-management"
                                     class="form-control"></textarea>
                       </div>

                   </div>
                   <!-- /.card-body -->

               </form>
           </div>
       </section>
   </section>



@endsection
