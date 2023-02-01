<form action="{{route('user.destroy',$user_id)}}" method="POSt">
@csrf
@method('DELETE')
<?php if($status==0){ ?>
<a  href="{{route('status',$user_id)}}" title="not active" data-toggle="tooltip" style="font-size:24px;color:red"><i class="fa fa-times "></i></a>      
<?php } if($status==1) {?>
<a  href="{{route('status',$user_id)}}" title="active" data-toggle="tooltip" style="font-size:24px;color:green"><i class="fa fa-check"></i></a>      
<?php }?>
<a  href="{{route('user.edit',$user_id)}}" title="Edit" data-toggle="tooltip" style="font-size:24px;color:green"><i class="fa fa-edit"></i></a>
<button type ="submit" style="font-size:24px;color:red;background-color:white;border:0px"><i class="fa fa-trash"></i></button>
</form>
