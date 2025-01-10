<div class="kt-portlet">
            
    <!--begin::Form-->
    <div class="kt-form">
        <div class="kt-portlet__body">
            
<span class="text-danger">Quá {{ env('LEAD_MAX_DATE') }} ngày không cập nhật lịch sử tư vấn thì hệ thống tự động thu hồi đầu mối và chuyển cho sale khác</span>
            <div class="log_action">
                <label>Lưu lịch sử tư vấn</label>
                <div class="form-group-div form-group col-md-12" style="margin-bottom: 10px;" id="form-group-name">
                    <div class="col-xs-12">                                            
                        <input type="text" name="log_name" placeholder="Chủ đề" class="form-control required" >
                    </div>  
                </div>
                <div class="form-group-div form-group col-md-12" id="form-group-name">
                    <div class="col-xs-12">                                            
                        <textarea type="text" placeholder="Nội dung tư vấn" name="log_note" class="form-control required" ></textarea>
                    </div>
                </div>
                <div class="form-group-div form-group col-md-12" id="form-group-name">
                    @if($result->status == 'Thả nổi')
                        <p style="color: red; font-weight: bold;">Nhớ chuyển trạng thái sang "Đang chăm sóc"</p>
                    @endif
                    <button type="button" class="log_submit">Lưu lại</button>
                </div>
                <script type="">
                    $('.log_action .log_submit').click(function() {
                        if ($('textarea[name=log_note]').val() == '') {
                            alert('Không được để trống Nội dung tư vấn');
                        } else {
                            $.ajax({
                                url: '/admin/lead/lead-contacted-log',
                                type: 'POST',
                                data: {
                                    title: $('input[name=log_name]').val(),
                                    note: $('textarea[name=log_note]').val(),
                                    lead_id: '{{ @$result->id }}',
                                    type: 'lead',
                                },
                                success: function() {
                                    location.reload();
                                    // window.location.href = "/admin/lead";
                                },
                                error: function() {
                                    alert('Có lỗi xảy ra. Vui lòng load lại trang và thử lại!');
                                }
                            });
                        }
                    });
                </script>
            </div>

            <div class="log_logs">
                <?php 
            $logs = \App\CRMEdu\Models\LeadContactedLog::where('type', 'lead')->where('lead_id', @$result->id)->orderBy('id', 'desc')->get();
            ?>
            @foreach($logs as $log)
            <hr>
                <div class="log-item" data-id="{{ $log->id }}" style="color: #000;">
                    <i></i>
                    <div class="log-content">
                        <span><strong>{{ $log->title }}</strong></span>
                        <p style="font-size: 13px; margin: 0;">{!! $log->note !!}</p>
                    </div>
                    <i style="font-size: 11px;">{{ date('H:i d/m/Y', strtotime($log->created_at)) }}   - Bởi: {{ @$log->admin->name }}</i>
                </div>
            @endforeach
            <hr>
                <div class="log-item" data-id="" style="color: #000;">
                    <i></i>
                    <div class="log-content">
                        <p style="font-size: 13px; margin: 0;">Tạo mới</p>
                    </div>
                    <i style="font-size: 11px;">{{ date('H:i d/m/Y', strtotime(@$result->created_at)) }}   - Bởi: {{ @$result->admin->name }}</i>
                </div>
            </div>
        </div>
    </div>
</div>