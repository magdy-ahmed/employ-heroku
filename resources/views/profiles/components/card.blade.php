
<?php $c = substr($profile->content,0); ?>
<h4 class="text-center ">الملف الشخصى ({{$profile->user->name}})
</h4>
@if (Request::route('id') === null)
   <a href="{{route('profile.edit')}}">  تحرير <i class="fas fa-pencil-alt"></i> </a>
@endif

<div class="text-right">
    @if (isset($profile->content))
        <?php echo $profile->content; ?>
    @endif

</div>
