<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="M Power garage">
    <meta content="garage" name="keywords">
    <meta name="author" content="">

    <title>M Power</title>

    <!-- Favicons -->
    <link href="{{asset('/img/logo.jpg')}}" rel="icon">
    <link href="{{asset('/img/logo.jpg')}}" rel="apple-touch-icon">

    <!-- Custom fonts for this template-->
    <!--    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('/vendor/bootstrap/css/bootstrap.rtl.css')}}" rel="stylesheet">
    <link href="{{asset('/vendor/bootstrap/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style-rtl.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/search.css')}}" rel="stylesheet">
    <style>
        body {
            background-image: url({{asset('/img/background_new1.jpg')}});
            background-repeat: no-repeat;
            background-attachment: local;
            position: fixed;
            width: 100%;
            height: 100%;
            background-size: 100% 100%;
        }
    </style>

</head>
<body class="background-image">
<div class="container container_fill_parent" style="background-color: rgba(0,0,0,0.74); border-radius: 15px">
    <div class="border-0 shadow-lg my-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <form method="post" action="/search" class="user car_info_form">
{{--                        @csrf--}}
                        <div class="form-group row">
                            <div class="col-lg-2 form-group">
                                <input type="text" name="firstNumber"  class="form-control form-control-user" id="exampleFirstName"
                                       placeholder="الرقم الإداري">
                            </div>
                            <div class="col-lg-4 form-group">
                                <input type="text" name="secondNumber" class="form-control form-control-user" id="exampleLastName"
                                       placeholder="رقم اللوحة">
                            </div>
                            <div class="col-lg-2 form-group">
                                <button type="submit" class="btn btn-primary btn-user btn-block" id="search">
                                    بحث
                                </button>
                            </div>
                            <div class="col-lg-2 form-group">
                                <button class="btn btn-primary btn-user btn-block" id="generate-qrcode">
                                    QRCode إنشاء
                                </button>
                            </div>
                            <div class="col-lg-2 form-group">
                                <a href="/" class="btn btn-primary btn-user btn-block">الصفحة الرئيسية</a>
                            </div>
                        </div>
                        <br>
                        <!--<div class="form-group row">
                            <div class="col-sm-2"><p style="color: white"><b>Owner Name : </b></p></div>
                            <div class="col-sm-4">
                                <p id="user_name"></p>
                            </div>
                            <div class="col-sm-2"><p style="color: white"><b>Owner Number : </b></p></div>
                            <div class="col-sm-4">
                                <p id="user_number"></p>
                            </div>
                        </div>
                        <hr>-->
                        <div class="form-group row">
                            <div class="col-lg-2 form-group"><p style="color: white"><b>الكيلومتر الحالي :</b></p></div>
                            <div class="col-lg-4 form-group">
                                <p id="current_km">{{  $service->currentKM?? ""}}</p>
                            </div>
                            <div class="col-lg-2 form-group"><p style="color: white"><b>الموعد القادم :</b></p></div>
                            <div class="col-lg-4 form-group">
                                <p id="next_km">{{  $service->nextKM?? ""}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-2 form-group"><p style="color: white"><b>تاريخ التبديل :</b></p></div>
                            <div class="col-lg-4 form-group">
                                <p id="date_of_changing">{{  $service->dateOfChanges?? ""}}</p>
                            </div>
                            <div class="col-lg-2 form-group"><p style="color: white"><b>الأقرب منهما :</b></p></div>
                            <div class="col-lg-4 form-group">
                                <p id="nearestـdate">{{  $service->dateOfChanges?? ""}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-2 form-group"><p style="color: white"><b>اسم السيارة:</b></p></div>
                            <div class="col-lg-4 form-group">
                                <p id="car_name">{{  $service->name?? ""}}</p>
                            </div>
                            <div class="col-lg-2 form-group"><p style="color: white"><b>النوع :</b></p></div>
                            <div class="col-lg-4 form-group">
                                <p id="car_type_code">{{  $service->type?? ""}}</p>
                            </div>

                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-2 form-group"><p style="color: white"><b>اللون :</b></p></div>
                            <div class="col-lg-4 form-group">
                                <p id="car_color">{{  $service->color?? ""}}</p>
                            </div>
                            <div class="col-lg-2 form-group"><p style="color: white"><b>الطراز :</b></p></div>
                            <div class="col-lg-4 form-group">
                                <p id="car_model">{{  $service->model?? ""}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-lg-2 form-group"><p style="color: white"><b> الرقم الإداري :</b></p></div>
                            <div class="col-lg-4 form-group">
                                <p id="plate_first_number">{{  $service->plateFirstNumber?? ""}}</p>
                            </div>
                            <div class="col-lg-2 form-group"><p style="color: white"><b>رقم اللوحة :</b></p></div>
                            <div class="col-lg-4 form-group">
                                <p id="plate_second_number">{{  $service->plateSecondNumber?? ""}}</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="custom-modal-content">
        <div class="qr-code" style="display: none;">
            <button class="btn close_btn">إغلاق</button>
            <button class="btn">
                <a href="" download="qr_code_linq.png">تحميل</a>
            </button>
        </div>
    </div>

</div>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/js/moment.js')}}"></script>
<script src="{{asset('/js/search.js')}}"></script>
<script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<!--<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>-->

</body>

</html>
