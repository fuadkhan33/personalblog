<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
<?php $i=0; ?>
    @foreach ($post->images as $image)


      <div class="carousel-item <?php if($i==0){echo "active";} $i++;?>">
        <img class="d-block w-100 card-img-size" src="{{asset($image->image)}}" alt="First slide">
      </div>

    @endforeach
</div>
