<div class="card admin-users">
    <h5 class="card-header text-center font-bolder font-25">جميع المستخدمين</h5>
        <table class="table app-table card-body">
            <thead>
                <tr>
                    <th class="text-right" scope="col">الأيميل</th>
                    <th class="text-right" scope="col">أسم المستخدم</th>
                    <th class="text-right" scope="col">الدور</th>
                    <th class="text-right" scope="col">حذف</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
                @foreach($users as $user)
                    <tr>
                        <th class="text-right" scope="row">{{$user->email}}</th>
                        <td class="text-right">{{$user->name}}</td>
                        <td class="text-right">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                {{$user->role[0]->name??''}}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach ( $roles as $role)
                                    <a class="dropdown-item" href="{{ route( 'users.update.role' , ['user_id'=>$user->id , 'role_id'=>$role->id ]) }}">{{ $role->name }}</a>
                                @endforeach
                            </ul>
                            </div>
                        </td>
                        @include('users.components.model',['id' =>$user->id ])
                        <td class="text-right app-danger"> <a href="#" data-toggle="modal" data-target="#delete-user-{{$user->id}}"> <i class="fas fa-trash-alt"></i></a></td>
                        <form class="d-none" id="users-destroy-{{$user->id}}"
                            action="{{ route( 'users.destroy' , $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                @endforeach
            </tbody>
        </table>
</div>
