@csrf
<div class="form-group">
    <label class=" {{ auth()->user()->darkmode ? "text-dm" : '' }} for="title">عنوان المشروع</label>
    <input type="text" class="form-control {{ auth()->user()->darkmode ? "form-control-dm" : "" }} id="title" name="title" value="{{ $project->title }}">
    @error('title')
      <div class="text-danger">
        <small>{{$message}}</small>
      </div>
  @enderror
</div>


  <div class="form-group">
    <label class=" {{ auth()->user()->darkmode ? "text-dm" : '' }} for="description">وصف المشروع</label>
    <textarea name="description" class="form-control {{ auth()->user()->darkmode ? "form-control-dm" : "" }}" id="description">{{ $project->description }}</textarea>
 @error('description')
     <div class="text-danger">
       <small>{{$message}}</small>
     </div>
 @enderror
  </div>