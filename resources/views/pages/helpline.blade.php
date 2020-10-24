@extends('layouts.master')

@section('content')



<div class='container m-5'>

  <div class="cta-sektion cta-padding35">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h5><span class="glyphicon glyphicon-cog "></span> <b>আপনি কি ফসলের রোগ নিয়ে চিন্তিত ?  </b> তাহলে আমাদের নিচের ফর্মটি পূরন করুন </h5>
                <br>
    <h5>
      আপনার নিকট আমাদের বিশেষজ্ঞ প্রতিনিধি পাঠানো হবে সাথে থাকুন.  
    </h5>
            </div>
            
    </div>
</div>
</div>

	<div class="container bg1">

  <legend class="h1 text-center bg1 mt-5">আবেদন করুন</legend>
  <div class="container wrapper">
    <form class="form-horizontal" role="form" method="post"  action="{{route('helpline.store')}}" enctype="multipart/form-data">
      @csrf
      @include('partials.messeage')

      <div class="form-group">
    <label for="name">নাম</label>
    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name" class="from-control{{$errors->has('name')?'is-invalid' :''}}" value="{{Auth::check()? Auth::user()->name : ''}}">
      
    
  </div>
  <div class="form-group">
    <label for="phone">ফোন নাম্বার</label>
    <input type="text" class="form-control" id="phone" name="phone_no" placeholder="Phone Numer" class="from-control{{$errors->has('phone')?'is-invalid' :''}}" value="{{Auth::check()? Auth::user()->phone : ''}}">
  </div>

  <div class="form-group">
    <label for="ivision">বিভাগ</label>
    <select  class="form-control" id="division_id" name="division">
      <option value="">নির্বাচন করুন  </option>
      @foreach($divisions as $division)

    <option value="{{$division->id}}">{{$division->name}}</option>
          


    @endforeach
      
    </select>
  </div>
  <div class="form-group">
    <label for="district">জেলা</label>
    <select  class="form-control" id="district_id" name="district">
      <option  value="short_name">নির্বাচন করুন  </option>
      
      
    </select>
</div>

<div class="form-group">
    <label for="Sub district">উপজেলা</label>
    <select  class="form-control" id="sub_district_id" name="sub_district">
        <option value="short_name">নির্বাচন করুন </option>
        
      
    </select>
</div>


<div class="form-group">
    <label for="Union">ইউনিয়ন</label>
    <select  class="form-control" id="union_id" name="union">
        <option value="union">নির্বাচন করুন </option>
        
      
    </select>
</div>

  

<div class="form-group">
    <label for="exampleTextarea">মেসেজ</label>
    <textarea class="form-control" id="address" name="message" rows="3" placeholder="বিশেষ কোনো বার্তা থাকলে এইখানে লিখুন।" ></textarea>
  </div>


  
  <button type="submit" class="btn btn-primary">জমা দিন</button>


    </form>
  </div>
</div>
</div>




@endsection

@section('scripts')
<script type="text/javascript">
	
	$("#division_id").change(function(){


                var division =   $("#division_id").val();
                
                $("#district_id").html("");

                var option ='<option value="">নির্বাচন করুন </option>';

                
                $.get( "http://127.0.0.1:8000/get-districts/"+division, function( data ) {


               data = JSON.parse(data)
              data.forEach(function(element){



                option += "<option value='"+element.id+"'>"+ element.name + "</option>";

              });
              $("#district_id").html(option);

 }); 
                 });

        $("#district_id").change(function(){


                var district =   $("#district_id").val();
                
                $("#sub_district_id").html("");
        var option ='<option value=""> নির্বাচন করুন</option>';

               
                $.get( "http://127.0.0.1:8000/get-sub_districts/"+district, function( data ) {

              data = JSON.parse(data)
              data.forEach(function(element){
                option += "<option value='"+element.id+"'>"+ element.name + "</option>";

              });
              $("#sub_district_id").html(option);

 });
                 });

        $("#sub_district_id").change(function(){


                var sub_district =   $("#sub_district_id").val();
                
                $("#union_id").html("");
        var option ='<option value="">নির্বাচন করুন  </option>';

               
                $.get( "http://127.0.0.1:8000/get-unions/"+sub_district, function( data ) {

              data = JSON.parse(data)
              data.forEach(function(element){
                option += "<option value='"+element.id+"'>"+ element.name + "</option>";

              });
              $("#union_id").html(option);

 });
                 });

         

</script>

@endsection