// select2
if ( $.isFunction($.fn.select2) ){
  $.fn.select2.defaults.set("language","id");
}

function fix_datepicker_visibility(selector){
  $(selector).datetimepicker()
  .off("dp.show")
  .off("dp.hide")
  .on('dp.show',function(){
    $('.card-body').css({'overflow':'visible'});
  })
  .on('dp.hide',function(){
    $('.card-body').css({'overflow':'hidden'});
  })
}
function datetimepicker_icons(){
  return {
    time: 'fa fa-clock',
    date: 'fa fa-calendar',
    up: 'fa fa-chevron-up',
    down: 'fa fa-chevron-down',
    previous: 'fa fa-chevron-left',
    next: 'fa fa-chevron-right',
    today: 'fa fa-home',
    clear: 'fa fa-trash',
    close: 'fa fa-times'
  }
}
function neko_random(length=5) {
  var result           = '';
  var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  var charactersLength = characters.length;
  for ( var i = 0; i < length; i++ ) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return result;
}
function neko_datepicker_debugmode(){
  // return true jika debug
  // return false jika environment normal
  return false;
}
function neko_max_number(){
  return '9223372036854775807';
}
function neko_datepicker(a){
  $("#"+a).attr("autocomplete","off");
  $("#"+a).datetimepicker({debug:neko_datepicker_debugmode(),icons:datetimepicker_icons(),format:'DD/MM/YYYY'});
  // fix_datepicker_visibility("#"+a);
}
function neko_datepicker_class(a){
  $("."+a).attr("autocomplete","off");
  $("."+a).datetimepicker({debug:neko_datepicker_debugmode(),icons:datetimepicker_icons(),format:'DD/MM/YYYY'});
  // fix_datepicker_visibility("."+a);
}
function neko_monthpicker(a){
  $("#"+a).attr("autocomplete","off");
  $("#"+a).datetimepicker({debug:neko_datepicker_debugmode(),icons:datetimepicker_icons(),format:'MM/YYYY'});
  // fix_datepicker_visibility("#"+a);
}
function neko_monthpicker_class(a){
  $("."+a).attr("autocomplete","off");
  $("."+a).datetimepicker({debug:neko_datepicker_debugmode(),icons:datetimepicker_icons(),format:'MM/YYYY'});
  // fix_datepicker_visibility("."+a);
}
function neko_datetimepicker(a){
  $("#"+a).attr("autocomplete","off");
  $("#"+a).datetimepicker({debug:neko_datepicker_debugmode(),icons:datetimepicker_icons(),format:'DD/MM/YYYY HH:mm:ss',viewMode:'days'});
  $("#"+a).off("dp.show").on("dp.show",function(e){$(e.target).data("DateTimePicker").viewMode("days")});
  // fix_datepicker_visibility("#"+a);
}
function neko_datetimepicker_class(a){
  $("."+a).attr("autocomplete","off");
  $("."+a).datetimepicker({debug:neko_datepicker_debugmode(),icons:datetimepicker_icons(),format:'DD/MM/YYYY HH:mm:ss',viewMode:'days'});
  $("."+a).off("dp.show").on("dp.show",function(e){$(e.target).data("DateTimePicker").viewMode("days")});
  // fix_datepicker_visibility("."+a);
}
function neko_yearpicker(a){
  $("#"+a).attr("autocomplete","off");
  $("#"+a).datetimepicker({debug:neko_datepicker_debugmode(),icons: datetimepicker_icons(),format:"YYYY",viewMode:"years"});
  $("#"+a).off("dp.show").on("dp.show",function(e){$(e.target).data("DateTimePicker").viewMode("years")});
  // fix_datepicker_visibility("#"+a);
}
function neko_yearpicker_class(a){
  $("."+a).attr("autocomplete","off");
  $("."+a).datetimepicker({debug:neko_datepicker_debugmode(),icons: datetimepicker_icons(),format:"YYYY",viewMode:"years"});
  $("."+a).off("dp.show").on("dp.show",function(e){$(e.target).data("DateTimePicker").viewMode("years")});
  // fix_datepicker_visibility("."+a);
}
function neko_select_pre_v(a,text,id){
  var c=$("#"+a);
  var f=new Option(text,id,true,true);
  c.append(f);c.trigger({type:"select2:select"})
}
function neko_select_pre_v_class(a,text,id){
  var c=$("."+a);
  var f=new Option(text,id,true,true);
  c.append(f);c.trigger({type:"select2:select"})
}
function neko_select2_init_element(c,axx) {
  $(axx).select2({width:'100%',ajax:{delay:500,url:c,dataType:'json',}});
}
function neko_select2_init_html_element(axx) {
  $(axx).select2({width:'100%'});
}
function neko_select2_init_html_slcmultiple_element(axx) {
  $(axx).select2({width:'100%'});
  $(document).ready(function () {
    $(axx).trigger('change');
  });
}
function neko_select2_init_empty(c,axx) {
  $('#'+axx).val('').html('');
  neko_select2_init(c,axx);
}
function neko_select2_init(c,axx) {
  $('#'+axx).select2({width:'100%',ajax:{delay:500,url:c,dataType:'json',}});
}
function neko_select2_init_data(c,axx,d={}) {
  $('#'+axx).select2({width:'100%',ajax:{delay:500,url:c,dataType:'json',data:function(params){
    var dx = {
      term: params.term,
    }
    return {...dx, ...d};
  },}});
}
function neko_select2_init_class_empty(c,axx) {
  $('.'+axx).val('').html('');
  neko_select2_init_class(c,axx);
}
function neko_select2_init_class(c,axx) {
  $('.'+axx).select2({width:'100%',ajax:{delay:500,url:c,dataType:'json',}});
}
function neko_e_html_i(a) {
  if(null==a)return '';
  return a.toString().replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/'/g,"&#039;");
}
function neko_notify(a,b){
  const nekoToast = Swal.mixin({
    toast:true,
    customClass: {
      confirmButton: 'btn btn-info btn-sm m-2',
      cancelButton: 'btn btn-danger btn-sm m-2'
    },
    buttonsStyling: false,
    position:'top-end',
    showConfirmButton:true,
    timer:15000,
    timerProgressBar: true,
  });
  nekoToast.fire({
    showClass:{popup:''},
    icon:a,
    title:b,
  });
}
function neko_danger(){
  neko_notify('error','Terjadi kesalahan! Server tidak bisa memproses permintaan anda. Harap lengkapi data lalu coba kembali.')
}
function neko_danger_r(){
  neko_notify('error','Terjadi kesalahan! Server tidak bisa memproses permintaan anda. Diharapkan untuk me-refresh halaman ini.')
}
function neko_edit_success(){
  neko_notify('success','Data berhasil diedit.')
}
function neko_load_success(){
  neko_notify('success','Data berhasil ditampilkan.')
}
function neko_simpan_success(){
  neko_notify('success','Data berhasil disimpan.')
}
function neko_proses(){
  neko_notify('info','Sedang memproses. Mohon tunggu...')
}
function neko_edit_error(){
  neko_notify('error','Data gagal diedit! harap periksa kembali dan lengkapi data-data yang diperlukan (ditandai dengan tanda bintang*).')
}
function neko_simpan_error(){
  neko_notify('error','Data gagal disimpan! harap periksa kembali dan lengkapi data-data yang diperlukan (ditandai dengan tanda bintang*).')
}
function neko_simpan_error_noreq(){
  neko_notify('error','Data gagal disimpan! harap periksa kembali dan lengkapi data-data yang diperlukan.')
}
function neko_d_custom_error(a){
  neko_notify('error',neko_e_html_i(a))
}
function neko_d_custom_info(a){
  neko_notify('info',neko_e_html_i(a))
}
function neko_d_custom_warning(a){
  neko_notify('warning',neko_e_html_i(a))
}
function neko_d_custom_success(a){
  neko_notify('success',neko_e_html_i(a))
}
function neko_peringatan(){
  neko_notify('error','Error. Mohon untuk mengisi data dengan benar.')
}
function neko_refresh(){
  neko_d_custom_error('Terjadi kesalahan! Mohon untuk me-refresh halaman ini.')
}
function neko_required(){
  neko_d_custom_error('Terjadi kesalahan. Mohon untuk melengkapi data lalu coba kembali.')
}
function neko_refresh_datatable(id){
  $('#'+id).DataTable().ajax.reload();
}
function neko_printdiv(aa){
  var aw=document.getElementById(aa).innerHTML,
      bx=document.getElementById(aa+'-size').value;
  var bw=window.open('','Print-Window');
  bw.document.open();
  bw.document.write(`
  <html>
    <head>
      <style>
        body {
          overflow-x: hidden, margin:0 !important;
          padding: 0 !important;
          font-family: "arial", arial, serif;
          color: #000;
          background: 0 0;
          font-size: 12pt
        }

        @page { margin: 0 }
        body { margin: 0 }
        .sheet {
          margin: 0;
          overflow: hidden;
          position: relative;
          box-sizing: border-box;
          page-break-after: always;
        }

        /** Paper sizes **/
        body.A3           .sheet { width: 297mm; height: 419mm }
        body.A3.landscape .sheet { width: 420mm; height: 296mm }
        body.A4           .sheet { width: 210mm; height: 296mm }
        body.A4.landscape .sheet { width: 297mm; height: 209mm }
        body.A5           .sheet { width: 148mm; height: 209mm }
        body.A5.landscape .sheet { width: 210mm; height: 147mm }

        /** No Margin **/
        body.A3-nomargin           .sheet { width: 0mm; height: 0mm }
        body.A3-nomargin.landscape .sheet { width: 0mm; height: 0mm }
        body.A4-nomargin           .sheet { width: 0mm; height: 0mm }
        body.A4-nomargin.landscape .sheet { width: 0mm; height: 0mm }
        body.A5-nomargin           .sheet { width: 0mm; height: 0mm }
        body.A5-nomargin.landscape .sheet { width: 0mm; height: 0mm }

        /** Padding area **/
        .sheet.padding-0mm { padding: 0mm }
        .sheet.padding-10mm { padding: 10mm }
        .sheet.padding-15mm { padding: 15mm }
        .sheet.padding-20mm { padding: 20mm }
        .sheet.padding-25mm { padding: 25mm }

        /** For screen preview **/
        @media screen {
          body { background: #e0e0e0 }
          .sheet {
            background: white;
            box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);
            margin: 5mm;
          }
        }

        /** Fix for Chrome issue #273306 **/
        @media print {
                   body.A3.landscape, body.A3-nomargin.landscape                   { width: 420mm }
          body.A3, body.A4.landscape, body.A3-nomargin, body.A4-nomargin.landscape { width: 297mm }
          body.A4, body.A5.landscape, body.A4-nomargin, body.A5-nomargin.landscape { width: 210mm }
          body.A5, body.A5-nomargin                                                { width: 148mm }
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
          page-break-after: avoid
        }

        h1 {
          font-size: 19pt
        }

        h2 {
          font-size: 17pt
        }

        h3 {
          font-size: 15pt
        }

        h5 {
          font-size: 13pt
        }

        h6 {
          font-size: 12pt
        }

        td {
          font-size: 10pt
        }

        h4 {
          font-size: 14pt
        }

        h2,
        h3,
        p {
          orphans: 3;
          widows: 3
        }

        code {
          font: 12pt Courier, monospace
        }

        blockquote {
          margin: 1.2em;
          padding: 1em;
          font-size: 12pt
        }

        hr {
          background-color: #ccc
        }

        img {
          float: left;
          margin: 1em 1.5em 1.5em 0;
          max-width: 100% !important
        }

        a img {
          border: none
        }

        a:link,
        a:visited {
          background: 0 0;
          font-weight: 700;
          text-decoration: underline;
          color: #333
        }

        a:link[href^="http://"]:after,
        a[href^="http://"]:visited:after {
          content: " ("attr(href) ") ";
          font-size: 90%
        }

        abbr[title]:after {
          content: " ("attr(title) ")"
        }

        a[href^="http://"] {
          color: #000
        }

        a[href$=".gif"]:after,
        a[href$=".jpeg"]:after,
        a[href$=".jpg"]:after,
        a[href$=".png"]:after {
          content: " ("attr(href) ") ";
          display: none
        }

        a[href^="#"]:after,
        a[href^="javascript:"]:after {
          content: ""
        }

        table {
          margin: 1px;
          text-align: left
        }

        th {
          font-weight: 700
        }

        tfoot {
          font-style: italic
        }

        caption {
          background: #fff;
          margin-bottom: 2em;
          text-align: left
        }

        thead {
          display: table-header-group
        }

        img,
        tr {
          page-break-inside: avoid;
          break-inside: avoid;
        }

        .bsb{
          border:1px solid black!important;
          padding:2px;
          vertical-align: middle
        }

        @media print {
          @page {
            size: ${bx}
          }
        }

        body {
          -webkit-print-color-adjust: exact !important;
        }

        .force-nobreak {
          page-break-inside: avoid !important;
          break-inside: avoid !important;
        }
      </style>
    </head>
    <body onload="window.print()"><section class="sheet padding-0mm">${aw}</section></body>
  </html>
  `);
  bw.document.close();
}
function neko_printdiv_continuous(aa){
  var aw=document.getElementById(aa).innerHTML,
      bx=document.getElementById(aa+'-size').value;
  var bw=window.open('','Print-Window');
  bw.document.open();
  bw.document.write(`
  <html>
    <head>
      <style>
        body {
          overflow-x: hidden, margin:0 !important;
          padding: 0 !important;
          font-family: "arial", arial, serif;
          color: #000;
          background: 0 0;
          font-size: 12pt
        }

        @page { margin: 0 }
        body { margin: 0 }
        .sheet {
          margin: 0;
          overflow: hidden;
          position: relative;
          box-sizing: border-box;
          page-break-after: always;
        }

        /** Paper sizes **/
        body.A3           .sheet { width: 297mm; height: 419mm }
        body.A3.landscape .sheet { width: 420mm; height: 296mm }
        body.A4           .sheet { width: 210mm; height: 296mm }
        body.A4.landscape .sheet { width: 297mm; height: 209mm }
        body.A5           .sheet { width: 148mm; height: 209mm }
        body.A5.landscape .sheet { width: 210mm; height: 147mm }

        /** No Margin **/
        body.A3-nomargin           .sheet { width: 0mm; height: 0mm }
        body.A3-nomargin.landscape .sheet { width: 0mm; height: 0mm }
        body.A4-nomargin           .sheet { width: 0mm; height: 0mm }
        body.A4-nomargin.landscape .sheet { width: 0mm; height: 0mm }
        body.A5-nomargin           .sheet { width: 0mm; height: 0mm }
        body.A5-nomargin.landscape .sheet { width: 0mm; height: 0mm }

        /** Padding area **/
        .sheet.padding-0mm { padding: 0mm }
        .sheet.padding-10mm { padding: 10mm }
        .sheet.padding-15mm { padding: 15mm }
        .sheet.padding-20mm { padding: 20mm }
        .sheet.padding-25mm { padding: 25mm }

        /** For screen preview **/
        @media screen {
          body { background: #e0e0e0 }
          .sheet {
            background: white;
            box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);
            margin: 5mm;
          }
        }

        /** Fix for Chrome issue #273306 **/
        @media print {
                   body.A3.landscape, body.A3-nomargin.landscape                   { width: 420mm }
          body.A3, body.A4.landscape, body.A3-nomargin, body.A4-nomargin.landscape { width: 297mm }
          body.A4, body.A5.landscape, body.A4-nomargin, body.A5-nomargin.landscape { width: 210mm }
          body.A5, body.A5-nomargin                                                { width: 148mm }
        }

        h1 {
          font-size: 19pt
        }

        h2 {
          font-size: 17pt
        }

        h3 {
          font-size: 15pt
        }

        h5 {
          font-size: 13pt
        }

        h6 {
          font-size: 12pt
        }

        td {
          font-size: 10pt
        }

        h4 {
          font-size: 14pt
        }

        h2,
        h3,
        p {
          orphans: 3;
          widows: 3
        }

        code {
          font: 12pt Courier, monospace
        }

        blockquote {
          margin: 1.2em;
          padding: 1em;
          font-size: 12pt
        }

        hr {
          background-color: #ccc
        }

        img {
          float: left;
          margin: 1em 1.5em 1.5em 0;
          max-width: 100% !important
        }

        a img {
          border: none
        }

        a:link,
        a:visited {
          background: 0 0;
          font-weight: 700;
          text-decoration: underline;
          color: #333
        }

        a:link[href^="http://"]:after,
        a[href^="http://"]:visited:after {
          content: " ("attr(href) ") ";
          font-size: 90%
        }

        abbr[title]:after {
          content: " ("attr(title) ")"
        }

        a[href^="http://"] {
          color: #000
        }

        a[href$=".gif"]:after,
        a[href$=".jpeg"]:after,
        a[href$=".jpg"]:after,
        a[href$=".png"]:after {
          content: " ("attr(href) ") ";
          display: none
        }

        a[href^="#"]:after,
        a[href^="javascript:"]:after {
          content: ""
        }

        table {
          margin: 1px;
          text-align: left
        }

        th {
          font-weight: 700
        }

        tfoot {
          font-style: italic
        }

        caption {
          background: #fff;
          margin-bottom: 2em;
          text-align: left
        }

        thead {
          display: table-header-group
        }

        .bsb{
          border:1px solid black!important;
          padding:2px;
          vertical-align: middle
        }

        @media print {
          @page {
            size: ${bx}
          }
        }

        body {
          -webkit-print-color-adjust: exact !important;
        }
      </style>
    </head>
    <body onload="window.print()"><section class="sheet padding-0mm">${aw}</section></body>
  </html>
  `);
  bw.document.close();
}
function neko_printdiv_landscape(aa){
  var aw=document.getElementById(aa).innerHTML,
      bx=document.getElementById(aa+'-size').value;
  var bw=window.open('','Print-Window');
  bw.document.open();
  bw.document.write(`
  <html>
    <head>
      <style>

        body {
          overflow-x: hidden, margin:0 !important;
          padding: 0 !important;
          font-family: "arial", arial, serif;
          color: #000;
          background: 0 0;
          font-size: 12pt
        }

        @page { margin: 0 }
        body { margin: 0 }
        .sheet {
          margin: 0;
          overflow: hidden;
          position: relative;
          box-sizing: border-box;
          page-break-after: always;
        }

        /** Paper sizes **/
        body.A3           .sheet { width: 297mm; height: 419mm }
        body.A3.landscape .sheet { width: 420mm; height: 296mm }
        body.A4           .sheet { width: 210mm; height: 296mm }
        body.A4.landscape .sheet { width: 297mm; height: 209mm }
        body.A5           .sheet { width: 148mm; height: 209mm }
        body.A5.landscape .sheet { width: 210mm; height: 147mm }

        /** No Margin **/
        body.A3-nomargin           .sheet { width: 0mm; height: 0mm }
        body.A3-nomargin.landscape .sheet { width: 0mm; height: 0mm }
        body.A4-nomargin           .sheet { width: 0mm; height: 0mm }
        body.A4-nomargin.landscape .sheet { width: 0mm; height: 0mm }
        body.A5-nomargin           .sheet { width: 0mm; height: 0mm }
        body.A5-nomargin.landscape .sheet { width: 0mm; height: 0mm }

        /** Padding area **/
        .sheet.padding-0mm { padding: 0mm }
        .sheet.padding-10mm { padding: 10mm }
        .sheet.padding-15mm { padding: 15mm }
        .sheet.padding-20mm { padding: 20mm }
        .sheet.padding-25mm { padding: 25mm }

        /** For screen preview **/
        @media screen {
          body { background: #e0e0e0 }
          .sheet {
            background: white;
            box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);
            margin: 5mm;
          }
        }

        /** Fix for Chrome issue #273306 **/
        @media print {
                   body.A3.landscape, body.A3-nomargin.landscape                   { width: 420mm }
          body.A3, body.A4.landscape, body.A3-nomargin, body.A4-nomargin.landscape { width: 297mm }
          body.A4, body.A5.landscape, body.A4-nomargin, body.A5-nomargin.landscape { width: 210mm }
          body.A5, body.A5-nomargin                                                { width: 148mm }
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
          page-break-after: avoid
        }

        .m-0 {
          margin: 0 !important;
          padding-left: 1rem !important;
        }

        h1 {
          font-size: 19pt
        }

        h2 {
          font-size: 17pt
        }

        h3 {
          font-size: 15pt
        }

        h5 {
          font-size: 13pt
        }

        h6 {
          font-size: 12pt
        }

        td {
          font-size: 10pt
        }

        h4 {
          font-size: 14pt
        }

        h2,
        h3,
        p {
          orphans: 3;
          widows: 3
        }

        code {
          font: 12pt Courier, monospace
        }

        blockquote {
          margin: 1.2em;
          padding: 1em;
          font-size: 12pt
        }

        hr {
          background-color: #ccc
        }

        img {
          float: left;
          margin: 1em 1.5em 1.5em 0;
          max-width: 100% !important
        }

        a img {
          border: none
        }

        a:link,
        a:visited {
          background: 0 0;
          font-weight: 700;
          text-decoration: underline;
          color: #333
        }

        a:link[href^="http://"]:after,
        a[href^="http://"]:visited:after {
          content: " ("attr(href) ") ";
          font-size: 90%
        }

        abbr[title]:after {
          content: " ("attr(title) ")"
        }

        a[href^="http://"] {
          color: #000
        }

        a[href$=".gif"]:after,
        a[href$=".jpeg"]:after,
        a[href$=".jpg"]:after,
        a[href$=".png"]:after {
          content: " ("attr(href) ") ";
          display: none
        }

        a[href^="#"]:after,
        a[href^="javascript:"]:after {
          content: ""
        }

        table {
          margin: 1px;
          text-align: left
        }

        th {
          font-weight: 700
        }

        tfoot {
          font-style: italic
        }

        caption {
          background: #fff;
          margin-bottom: 2em;
          text-align: left
        }

        thead {
          display: table-header-group
        }

        img,
        tr {
          page-break-inside: avoid;
          break-inside: avoid;
        }

        .bsb{
          border:1px solid black!important;
          padding:2px;
          vertical-align: middle
        }

        @media print {
          @page {
            size: ${bx} landscape
          }
        }

        body {
          -webkit-print-color-adjust: exact !important;
        }

        .force-nobreak {
          page-break-inside: avoid !important;
          break-inside: avoid !important;
        }
      </style>
    </head>
    <body onload="window.print()"><section class="sheet padding-0mm">${aw}</section></body>
  </html>
  `);
  bw.document.close();
}
function nyaa_generate_excel(aa,ac=null){
  TableToExcel.convert(document.getElementById(aa), {
    name: "RSUD-"+Date.now()+"-"+neko_random(15)+".xlsx",
    sheet: {
      name: ac??"RSUD Siti Fatimah - Persediaan",
    }
  });
}
function neko_form(url,n){
  $('<form action="'+url+'" method="POST"><input type="hidden" name="_token" value="'+$("meta[name='csrf-token']").attr('content')+'"/><input type="hidden" name="id" value="'+neko_e_html_i(n)+'"/></form>').appendTo('body').submit();
}
function nyaa_pw_view(slc,tr=[]){
  var ic = $(slc).is(':checked');
  if (Array.isArray(tr) && tr.length) {
    if(ic){
      tr.forEach(function callback(value, key) {
        $(value).attr('type','text');
      });
    }else{
      tr.forEach(function callback(value, key) {
        $(value).attr('type','password');
      });
    }
  }
}
function nyaa_popup_gambar(src){
  $.magnificPopup.open({
    items: {
      src: src,
    },
    type: 'image'
  });
}
function neko_lightbox(elem){
  $.magnificPopup.open({
    items: {
      src: $(elem).attr('data-src'),
    },
    type: 'iframe'
  });
}

