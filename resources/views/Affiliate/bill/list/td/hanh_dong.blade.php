{{--@if(in_array('bao_cao_dan_khach_add', $permissions) || in_array('super_admin', $permissions))--}}
{{--    <a href="/admin/bao_cao_dan_khach/add?code_id={{ $item->id }}" style="padding: 5px; border: 1px solid #ccc;">Báo cáo--}}
{{--        dẫn khách</a>--}}
{{--@endif--}}
<style>
    .hanh-dong{
        max-width: 80px;
        display: flex;
        flex-wrap: wrap;
        /*margin-top: 2px;*/

    }
    .hanh-dong span{
        background-color: transparent!important;



        /*padding: 4px;*/
    }
    .hanh-dong span a{
        text-decoration: none;
        /*color: #fff;*/
        font-weight: bold;
        font-size: 14px;
    }
    .hanh-dong .edit{
        /*background-color: #5d80f9;*/

        color: #5d80f9;
        margin-right: 20px;
        /*margin-bottom: 10px;*/

    }

    .hanh-dong .edit a{
        color: #1db2ff;

    }
    .hanh-dong .trash a{
             color: #eb3349;


         }
    .hanh-dong .trash{
        color: #eb3349;
    }
    .hanh-dong span{
        /*background-color: #1db2ff;*/
    }
    .duyet_don{
        color: blue !important;
    }
    .huy_don{
        color: yellow !important;
    }
</style>
@php
//dd($item->id);
//    $check_admin = \App\Models\Admin::find($item->admin_id)->roles();

//dd($permissions);
 @endphp
<div style="height: auto;" class="hanh-dong">
    @if(\Auth::guard('admin')->user()->roles()->where('name', 'super_admin')->exists()||1==1)
        @if(in_array($module['code'] . '_delete', $permissions) || in_array('super_admin', $permissions)||(\Auth::guard('admin')->user()->roles()->orderBy('id', 'desc')->first()->id == 2))
            @if($item->status == 0)
                <span class="trash"><a class="duyet_don" data-id="{{ $item->id }}"
                                       href=""
                                       title="Duyệt đơn">Duyệt</a></span>
            @endif
        @endif
        {{--    @if(in_array($module['code'] . '_delete', $permissions) || in_array('super_admin', $permissions))--}}
        {{--        <span class="trash"><a class="huy_don"--}}
        {{--                               href="{{ url('/admin/'.$module['code'].'/delete/' . $item->id) }}"--}}
        {{--                               title="Hủy">Hủy</a></span>--}}
        {{--    @endif--}}
{{--        @if(in_array($module['code'] . '_delete', $permissions) || in_array('super_admin', $permissions))--}}
{{--            <span class="trash"><a class="delete-warning"--}}
{{--                                   href="{{ url('/admin/'.$module['code'].'/delete/' . $item->id) }}"--}}
{{--                                   title="Xóa bản ghi">Delete</a></span>--}}
{{--        @endif--}}
    @endif
{{--    @if(in_array($module['code'] . '_edit', $permissions) || in_array('super_admin', $permissions) )--}}
{{--        <span class="edit"><a--}}
{{--                    href="{{ url('/admin/'.$module['code'].'/edit/' . $item->id) }}"--}}
{{--                    title="Sửa bản ghi này">  Edit</a>  </span>--}}
{{--    @endif--}}

</div>

