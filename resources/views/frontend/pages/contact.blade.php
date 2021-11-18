@extends('frontend.app')
@section('title', 'Tracy Shop || Liên hệ')
@section('content')
<div class="breadcrumbs_area">
<div class="row">
    <div class="col-12">
        <div class="breadcrumb_content">
            <ul>
                <li><a href="index.html">trang chủ</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>liên hệ</li>
            </ul>

        </div>
    </div>
</div>
</div>
<!--contact area start-->
<div class="contact_area">
    <div class="row">
           <div class="col-lg-6 col-md-12">
               <div class="contact_message">
                    <form method="POST" action="">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <input name="name" placeholder="Họ tên của bạn *" type="text">    
                            </div>
                            <div class="col-12">
                                <input name="email" placeholder="Địa chỉ email của bạn *" type="email">    
                            </div>
                            
                            <div class="col-12">
                                <input name="phone" placeholder="Số điện thoại của bạn *" type="text">   
                            </div>

                            <div class="col-12">
                                <div class="contact_textarea">
                                    <textarea placeholder="Nội dung *" name="message" class="form-control2"></textarea>     
                                </div>   
                                <button type="submit"> Gửi </button>  
                            </div> 
                            <div class="col-12">
                                <p class="form-messege">
                            </div>
                        </div>
                    </form>    
                </div> 
           </div>
          
           <div class="col-lg-6 col-md-12">
               <div class="contact_message contact_info">
                    <h3>liên hệ</h3> 
                        <p>{{ $contactInfo->description }}</p>
                        <ul>
                            <li><i class="fa fa-fax"></i>  Địa chỉ : {{ $contactInfo->address }}</li>
                            <li><i class="fa fa-phone"></i> <a href="#">{{ $contactInfo->phone }}</a></li>
                            <li><i class="fa fa-envelope-o"></i>{{ $contactInfo->email }} </li>
                        </ul>
                     
                    <h3><strong>Giờ làm việc</strong></h3>
                    <p><strong>Thứ 2 – Chủ nhật</strong>:  8h sáng – 22h tối</p>       
                </div> 
           </div>
       </div>
</div>

<!--contact area end-->
                    
<!--contact map start-->
<div class="contact_map">
    <div class="row">
        <div class="col-12">
        	<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d33407.41843360512!2d106.05149481299452!3d21.179119176077705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1zQ8awzIlhIGhhzIBuZyBUcmFjeSBCxIPMgWMgTmluaA!5e0!3m2!1svi!2s!4v1622590434836!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>
<!--contact map end-->
@endsection