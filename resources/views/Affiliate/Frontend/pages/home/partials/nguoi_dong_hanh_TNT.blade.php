<style>
    .seo-reports.seo-reports2.cus-seo-reports .col-lg-7 {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cnt-block span {
        font-size: 24px;
    }

    .seo-reports .main-author h2 {
        padding-top: 15px;
    }

    .main-author ul {
        list-style: none;
        background: #fff;
        border-radius: 20px;
        padding: 36px 32px;
        box-shadow: 0 10px 25px 5px rgba(137, 173, 255, .35);
    }

    .main-author ul li .author-list__intro {
        display: flex;
        align-items: flex-start;
    }

    .author-list__intro .author-list-tick__intro {
        margin-right: 10px;
    }

    .author-list__intro .author-list-name__intro {
        font-style: normal;
        font-weight: 700;
        /*font-size: 15px;*/
        line-height: 35px;
    }

    .title-author .head-block .col-md-10{
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding-bottom: 60px;
    }
    .title-author .head-block .col-md-10 h2{
        padding: 0 0 0 30px;
    }
</style>
<?php
if (!isset($widget))
    $widget = \App\Modules\Post\Models\Widget::where('location', 'giang_vien_chinh')->where('status', 1)->first();

?>
@if(isset($widget) && is_object($widget))
<section class="seo-reports seo-reports2 cus-seo-reports title-author">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="cnt-block main-author">
                    <span>{{$widget->title}}</span>
                    {!! $widget->content !!}
                        <?php
                        // Nội dung của widget->data
                        $data = $widget->data;

                        // Tạo đối tượng DOMDocument
                        $dom = new \DOMDocument();
                        libxml_use_internal_errors(true); // Để tránh lỗi về HTML không hợp lệ

                        // Load nội dung HTML vào DOMDocument với mã hóa UTF-8
                        $dom->loadHTML(mb_convert_encoding($data, 'HTML-ENTITIES', 'UTF-8'));

                        // Lấy tất cả các thẻ <li>
                        $liTags = $dom->getElementsByTagName('li');

                        // Khởi tạo mảng để lưu nội dung của thẻ <li>
                        $liContents = [];

                        foreach ($liTags as $li) {
                            // Lấy nội dung text của mỗi thẻ <li>
                            // Không cần sử dụng html_entity_decode nữa
                            $liContents[] = trim($li->textContent);
                        }
                        ?>
                    <ul>
                        @foreach($liContents as $li)
                        <li>
                            <div class="author-list__intro">
                                <div class="author-list-tick__intro">
                                    <svg width="31" height="31" viewBox="0 0 31 31" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="15.0018" cy="15.501" r="15" fill="#4A50FF"></circle>
                                        <path d="M6.83252 15.5011L12.2803 20.9466L23.1713 10.0557" stroke="white"
                                              stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                                <div class="author-list-name__intro"> {{$li}}
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-7">
                <figure class="img"><img src="{{asset('AFF/images/'.$widget->image)}}" class="img-fluid" alt="">
                </figure>
            </div>
        </div>
    </div>
</section>
@endif