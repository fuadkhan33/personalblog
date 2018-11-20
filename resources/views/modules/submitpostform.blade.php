<form method="POST" action="{{route('user.post.submit',Auth::User()->id)}}" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Post Title</label>
    <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Post Title">

    @if ($errors->has('title'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Catagory</label>
    <select class="form-control" name="catagory" id="exampleFormControlSelect1">
      <?php $catagories = App\catagory::orderBy('Name','asc')->get(); ?>
      @foreach($catagories as $catagory)
      <option value="{{$catagory->id}}">{{$catagory->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">About Content</label>
    <textarea class="form-control" name="text" id="exampleFormControlTextarea1" placeholder="Write Something" rows="3"></textarea>

    @if ($errors->has('text'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('text') }}</strong>
        </span>
    @endif
  </div>
  <div class="custom-file cus-submit-post-button-mar">
   <input type="file" class="custom-file-input" name="images[]" id="validatedCustomFile" >
   @if ($errors->has('images[]'))
       <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('images[]') }}</strong>
       </span>
   @endif
   <label class="custom-file-label" for="validatedCustomFile">Chose a image for your post </label>
   <div class="invalid-feedback">Example invalid custom file feedback</div>


 </div>
 <div class="custom-file cus-submit-post-button-mar ">
  <input type="file" class="custom-file-input" name="images[]" id="validatedCustomFile" >
  @if ($errors->has('images[]'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('images[]') }}</strong>
      </span>
  @endif
  <label class="custom-file-label" for="validatedCustomFile">Chose a image for your post</label>
  <div class="invalid-feedback">Example invalid custom file feedback</div>
</div>
<div class="custom-file cus-submit-post-button-mar ">
 <input type="file" class="custom-file-input" name="images[]" id="validatedCustomFile" >
 @if ($errors->has('images[]'))
     <span class="invalid-feedback" role="alert">
         <strong>{{ $errors->first('images[]') }}</strong>
     </span>
 @endif
 <label class="custom-file-label" for="validatedCustomFile">Chose a image for your post</label>
 <div class="invalid-feedback">Example invalid custom file feedback</div>
</div>
  <div class="form-group cus-submit-post-button-mar">
    <div class="col-md-4">
      <div class="col-md-">
          <button type="submit" class="btn btn-primary">
              {{ __('Submit Post') }}
          </button>
      </div>
    </div>

  </div>

</form>
