@extends('layouts.master_home')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center p-5">About Us</h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="row pt-5">
        <div class="col-lg-6">
            <img src="{{ asset('frontend/assets/images/about/cow_2.jpg') }}" class="img-thumbnail" alt="...">
        </div>
        <div class="col-lg-6">
            <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, nostrum dolorem? Error nam vitae voluptate expedita rerum, eveniet voluptatibus molestiae veniam obcaecati exercitationem perferendis quidem earum quas porro possimus consequuntur.</p>
            <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, consequuntur inventore? Quas incidunt neque libero sequi eveniet impedit tenetur tempora delectus, quam repudiandae distinctio unde aliquam, nobis quae officia perferendis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, nostrum dolorem? Error nam vitae voluptate expedita rerum, eveniet voluptatibus molestiae veniam obcaecati exercitationem perferendis quidem earum quas porro possimus consequuntur.</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row pt-5">
        <div class="col-lg-6">
            <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, nostrum dolorem? Error nam vitae voluptate expedita rerum, eveniet voluptatibus molestiae veniam obcaecati exercitationem perferendis quidem earum quas porro possimus consequuntur.</p>
            <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, consequuntur inventore? Quas incidunt neque libero sequi eveniet impedit tenetur tempora delectus, quam repudiandae distinctio unde aliquam, nobis quae officia perferendis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, nostrum dolorem? Error nam vitae voluptate expedita rerum, eveniet voluptatibus molestiae veniam obcaecati exercitationem perferendis quidem earum quas porro possimus consequuntur.</p>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('frontend/assets/images/about/cow_2.jpg') }}" class="img-thumbnail" alt="...">
        </div>
    </div>
</div>

@endsection