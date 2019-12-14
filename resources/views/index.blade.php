@extends('parent')
  
@section('main')
<div align="right">
    <a href="{{ route('news.create') }}" class="btn btn-default">Add new</a>
   </div>
   
<table class="table table-bordered table-striped">
 <tr>
  <th width="10%">Image</th>
  <th width="35%"> Title</th>
  <th width="35%"> Informations</th>
  <th width="30%">Action</th>
 </tr>
 @foreach($data as $row)
  <tr>
   <td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
   <td>{{ $row->titre }}</td>
   <td>{{ $row->info }}</td>
   <td>
   <a href="{{route('news.show',$row->id)}}"class="btn btn-primary">show </a> 
   <a href="{{route('news.edit',$row->id)}}"class="btn btn-warning">edit </a> 
   <form action="{{route('news.destroy',$row->id)}}"method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" > delete </button>
   </form>

   </td>
  </tr>
 @endforeach
</table>
{!! $data->links() !!}
@endsection


   

 

@section('main')
@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif

<div align="right">
 <a href="{{ route('news.index') }}" class="btn btn-default">Back</a>
</div>

<form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">

 @csrf
 <div class="form-group">
  <label class="col-md-4 text-right">Enter the title</label>
  <div class="col-md-8">
   <input type="text" name="titre" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Enter the information </label>
  <div class="col-md-8">
   <input type="text" name="info" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Select Profile Image</label>
  <div class="col-md-8">
   <input type="file" name="image" />
  </div>
 </div>
 <br /><br /><br />
 <div class="form-group text-center">
  <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
 </div>

</form>

@endsection