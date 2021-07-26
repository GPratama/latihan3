<div class="row py-5">
    @foreach ($data as $item)
    <div class="card col-lg-3 col-md-4 col-sm-6" v-for="item in produks">
     <img src="{{asset($item->foto)}}" class="card-img-top" alt="">
     <div class="card-body bg-info">
       <h3 class="title-card text-center">{{$item->name}}</h3>
       <p class="text-card">
         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus,
         aut!
       </p>
       <h4 class="title-card">{{$item->harga}}</h4>
       <a class="btn btn-primary mt-3" href="{{route('customer.detail',$item->id)}}">Detail</a>
     </div>
   </div>
    @endforeach
 </div>