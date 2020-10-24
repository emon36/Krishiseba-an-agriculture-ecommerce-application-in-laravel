<!-- menu -->
      <div class="list-group">
        
        @foreach (App\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)

        <a href="#mainMenu{{ $parent->id}}" class="list-group-item list-group-item-action" data-toggle="collapse">
          
          {{$parent->name}}
        </a>
        <div class="child-rows collapse" id="mainMenu{{$parent->id}}">
         @foreach (App\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
         <a href="{!! route('categories.show',$child->id)  !!}" class="list-group-item list-group-item-action list-group-submenu">
           {{$child->name}}

         </a>
         @endforeach

          
        </div>
        @endforeach

      </div>

      @section('scripts')


      @endsection



