<!-- start: HEADER -->
<div class="navbar my-navbar navbar-fixed-top">
    
    <div class="navbar-header">

        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="clip-list-2"></span>
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
        </button>
        
        <a class="navbar-brand" href="{{ URL::to('admin/') }}">
           <strong>E-Learning SMKN 56 Jakarta</strong> 
        </a>
    </div> 


    <div class="horizontal-menu navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class=''>
                <a href=""> </a>
            </li>
            <li class=''>
                <a href="{{ URL::to('admin/') }}">
                    Dashboard
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('admin/materi') }}">
                    Materi   
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('admin/tugas') }}">
                    Tugas
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('admin/kuis') }}">
                    Kuis
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('admin/ujian') }}">
                    Ujian
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('admin/forum') }}">
                    Forum
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('admin/nilai') }}">
                    Nilai
                </a>
            </li>
            <li class="">
                <a href="javascript:void(0)" class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown">
                    <span class="selected"></span>
                    Setting <span class="caret"></span><i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="">
                        <a href="{{ URL::to('admin/setting_user') }}">
                            User Management
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ URL::to('admin/setting_grup') }}">
                            Group Management
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                    Hi, Admin<span class="username"></span>
                    <span class="caret">
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ URL::to('admin/profile') }}">
                            <i class="glyphicon glyphicon-user"></i>
                            &nbsp;My Profile
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ URL::to('admin/change_password') }}">
                            <i class="glyphicon glyphicon-wrench"></i>
                            &nbsp;Change Password
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ URL::to('admin/reset_password') }}">
                            <i class="glyphicon glyphicon-erase"></i>
                            &nbsp;Reset Password
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ URL::to('do_logout') }}">
                            <i class="glyphicon glyphicon-log-out"></i>
                            &nbsp;Log Out
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="">
                    
                </a>
            </li>
        </ul>
        
    </div>
</div>
