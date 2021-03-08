@extends('Frontend.layout.main')
@section('style')
    <title>Gửi thông tin liên hệ đến Xưởng Mộc</title>
@endsection
@section('content')
    <!-- BANNER -->
    <div class="banner-abt-wrap">
        <div class="img">
            <img src="/frontend/images/AnhCat/banner-lien-he.png" alt="Liên hệ với xưởng mộc giá tốt" class="w-100">
        </div>
        <div class="banner-content d-flex justify-content-center align-items-center w-100 h-100">
            <h1 class="text-center">liên hệ</h1>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        <div class="contact-box">
            <div class="box px-0  px-md-4">
                <div class="cont-box d-flex">
                    <div class="row">
                        <div class="col-lg-6 ">
                            <div class="img d-none d-lg-block">
                                <img src="/frontend/images/AnhCat/lien-he-img1.png" alt="Liên hệ" class="w-100">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="content">
                                <p class="title lien-he mb-2"> liên hệ với chúng tôi </p>
                                <form method="post" action="{{route('xuongmoc.create-contact')}}">
                                    @csrf
                                    <div class="form-group lien-he">
                                        <input required class="infor name" type="text" name="name" placeholder="Họ và tên">
                                        <input required class="infor email" type="text" name="email" placeholder="Email">
                                        <input required class="infor phone" type="text" name="phone" placeholder="Số điện thoại">
                                        <input class="infor content" type="text" name="content" placeholder="Nội dung">
                                        <br>
                                        <button class="contact-send" type="submit"> Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('detail_js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.contact-send').on('click', function () {
            if ($('.infor').val() == '' || $('.email').val() == '' || $('.phone').val() == '' || $('.name').val() == '') {
                swal({
                    icon: 'warning',
                    title: "Thông báo",
                    text: "Bạn chưa điền thông tin  :(",
                    dangerMode: true,
                })
            }

        })
    </script>
    @if(Session::get('mess'))
        <script>
            swal({
                icon: 'success',
                title: "Thông báo",
                text: "Cảm ơn bạn đã ghé shop! \n Xưởng sẽ liên lạc cho bạn với thời gian sớm nhất",
                dangerMode: true,
            })
        </script>
    @endif
@endsection
