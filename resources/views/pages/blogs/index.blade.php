@extends('layouts.master')

@section('content')


        
        <div class="container-fluid">
  
  <div class="row">
    <div class="col-md-3 mt-3">
      @foreach (App\Blog_categories::orderBy('name','asc')->get() as $categories)
         <a href="{!! route('blog_categories.show',$categories->id)  !!}" class="list-group-item list-group-item-action">
           {{$categories->name}}

         </a>
         @endforeach
       
  </div>
         

    <div class="col-md-8 feature">
        <div class="widget">
            @foreach($posts as $post)
            
            <div class="row">

          
                
          
                <div class="card" style="width:600;">
                    
    <div class="row no-gutters">
        <div class="col-md-3" style="background: #868e96;">
            
            <img src="{{Storage::disk('local')->url($post->image)}}" class="card-img-top h-100"> 
        </div>
   
        <div class="col-md-9">
            <div class="card-body">
                   <h5>{{$post->title}}</h5>
                     <article><p>
                         {{$post->small_body}}</p> </article>
                      
                     <a class="btn btn-info" href="{{ route('post.show',$post->slug)}}">বিস্তারিত পড়ুন</a>
                     <hr>
                    <span> <small>{{$post->created_at->diffForHumans()}}</small> </span>
                     </div> 

 

            </div>
        </div>
    </div>
</div>

@endforeach


<ul class="pager mt-3 mr-5">
    <li class="next">
        {{$posts->links()}}
        
    </li>
</ul>

            </div>
        </div>
        
    </div>
  
    









</div>




 @endsection
  
  
