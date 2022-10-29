<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{$blog->img_url}}"></div>
                    <div class="blog__item__text">
                        <span><img src="/fashion/img/icon/calendar.png" alt="">{{$blog->date}}</span>
                        <h5>{{$blog->blog_name}}</h5>
                        <a href="{{route('blogdetail', ['blog' => $blog -> id])}}">Đọc thêm</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Section End -->
