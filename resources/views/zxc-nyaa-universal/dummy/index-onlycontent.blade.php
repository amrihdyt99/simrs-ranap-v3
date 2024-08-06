@extends(app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->detect_component_user()->view->container_extends)

@push('nyaa_styles')
<style>
.uwu-test{
    font-size: 50px !important;
}
</style>
@endpush

@section('nyaa_content_header')
<div class="row">
    <div class="col-12">
        <p>Test Header</p>
    </div>
</div>
@endsection

@section('nyaa_content_body')
<div class="row">
    <div class="col-12">
        <p class="uwu-test">Test Body</p>
    </div>
</div>
@endsection

@push('nyaa_scripts')
<script>
    alert('uwu!');
</script>
@endpush
