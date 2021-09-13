@foreach($allData as $singleData)
<tr id="table_id_{{ $singleData->id }}" >
  <td>{{$singleData->id}}</td>
  <td><img src="{{asset('CategoryFolder/'.$singleData->category_image)}}" style="width:100px"></td>
  <td>{{$singleData->category_name}}</td>
  
  <td><div class="btn-group">
      <a href="javascript:void(0)" id="edit-user" data-id="{{ $singleData->id }}" class="btn btn-primary" >
          Edit
      </a>
      <a href="javascript:void(0)" id="delete-user" data-id="{{ $singleData->id }}" class="btn btn-danger">
        Delete
      </a>
    </div>
  </td>
</tr>
@endforeach