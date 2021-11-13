 <ol class="breadcrumb">
    <li class="breadcrumb-item {{isset($role)?(($role == 4)?' active':null):null}}">
        @if ($role != 4)
                <a href="{{route('admin.users.role',4)}}">باحث عن خدمة</a>
        @else
            باحث عن خدمة
        @endif
    </li>
    <li class="breadcrumb-item {{isset($role)?(($role == 2)?' active':null):null}}">
        @if ($role != 2)
            <a href="{{route('admin.users.role',2)}}">مسوق</a>
        @else
            مسوق
        @endif
    </li>
    <li class="breadcrumb-item {{isset($role)?(($role == 5)?' active':null):null}}">
        @if ($role != 5)
            <a href="{{route('admin.users.role',5)}}"> مسوق ومزود خدمات</a>
        @else
    </li>
            مسوق ومزود خدمات
        @endif
    </li>
    <li class="breadcrumb-item {{isset($role)?(($role == 3)?' active':null):null}}">
        @if ($role != 3)
            <a href="{{route('admin.users.role',3)}}">مزود خدمات</a>
        @else
            مزود خدمات
        @endif
    </li>
    <li class="breadcrumb-item {{isset($trashed)?' active':null}}">
        @if ( $role != 0)
            <a href="{{route('admin.users.trashed')}}">القائمة السوداء</a>
        @else
            القائمة السوداء
        @endif
    </li>
</ol>
<div class="card admin-users">
    <h5 class="card-header text-center font-bolder font-25">
    @switch($role)
        @case($role==0)
            عضويات معطلة
            @break
        @case($role==2)
            قائمة المسوقين
            @break
        @case($role==3)
            قائمة مزودى الخدمات
            @break
        @case($role==4)
            قائمة المستخدمين
            @break
        @case($role==5)
            قائمة مسوق و مزود خدمة
            @break
        @default
            جميع المستخدمين
    @endswitch

    </h5>
        <table class="table table-sm app-table card-body">
            <thead>
                <tr>
                    <th class="text-center" scope="col">الهاتف</th>
                    <th class="text-center" scope="col">أسم المستخدم</th>
                    <th class="text-center" scope="col">الدور</th>
                    <th class="text-center" scope="col">{{($role ==0 ? 'تفعيل':'تعطيل')}}</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
                @foreach($users as $user)
                    <tr>
                        <th class="text-center" scope="row">{{$user->phone}}</th>
                        <td class="text-center">{{$user->name}}</td>
                        <td class="text-center">
                        {{-- <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                {{$user->role[0]->name??''}}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach ( $roles as $role)
                                    <a class="dropdown-item" href="{{ route( 'users.update.role' , ['user_id'=>$user->id , 'role_id'=>$role->id ]) }}">{{ $role->name }}</a>
                                @endforeach
                            </ul>
                            </div> --}}
                            {{$user->role[0]->name}}
                        </td>
                        @include('admin.users.components.model',['id' =>$user->id ])
                        <form class="d-none" id="users-destroy-{{$user->id}}"
                            action="{{ ($role==0)?route( 'admin.users.restore' , $user->id):route( 'users.destroy' , $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td class="text-center app-danger"> <a href="#"
                                    onclick="event.preventDefault();
                                    document.getElementById('users-destroy-{{$user->id}}').submit();">
                                     @if ($role != 0)
                                        <i class="fas fa-user-lock"></i>

                                     @else
                                         <i class="fas fa-user-check"></i>
                                     @endif
                            </a>
                        </td>

                        </form>
                @endforeach
            </tbody>
        </table>
</div>
