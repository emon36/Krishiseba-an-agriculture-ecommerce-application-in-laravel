@extends('admin.layouts.master')

@section('content')



        <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> {{$productCount}} </h3>
                        <p> Total Product </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tractor"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3> {{$userCount}} </h3>
                        <p> Total User </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                        <h3> {{$orderCount}} </h3>
                        <p> Total Order </p>
                    </div>
                    <div class="icon">
               <i class="fas fa-sort-amount-up"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                        <h3> {{$serviceRequestCount}} </h3>
                        <p> Total Service Request </p>
                    </div>
                    <div class="icon">
                    	<i class="fas fa-concierge-bell"></i>
                    </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <div class="col-lg-4 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> {{$postCount}} </h3>
                        <p> Totoal Post </p>
                    </div>
                    <div class="icon">
                         <i class="fas fa-blog" aria-hidden="true"></i>                   
                                 </div>
                    <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>


        </div>
    </div>
          
  

    

  @endsection