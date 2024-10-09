<div class="text-black" style="font-size: 14px">
    <ul class="nav nav-tabs justify-content-center" id="newsTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form-tab-pane" aria-selected="true">Form</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history-tab-pane" aria-selected="false">History</a>
        </li>
    </ul>

    <div class="tab-content" id="newsTabContent">
        <div class="tab-pane fade show active" id="form" role="tabpanel" aria-labelledby="form-tab">
            @include('new_perawat.monitoring_news.new_entry_news')
        </div>
        <!-- <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
            @include('new_perawat.monitoring_news.history_entry_news')
        </div> -->
    </div>
</div>
@include('new_perawat.monitoring_news.detail_news')