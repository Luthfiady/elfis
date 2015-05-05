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
                <a href="">
                    Dashboard
                </a>
            </li>
            <li class="">
                <a href="">
                    Materi   
                </a>
            </li>
            <li class="">
                <a href="">
                    Tugas
                </a>
            </li>
            <li class="">
                <a href="">
                    Kuis
                </a>
            </li>
            <li class="">
                <a href="">
                    Ujian
                </a>
            </li>
            <li class="">
                <a href="">
                    Forum
                </a>
            </li>
            <li class="">
                <a href="">
                    Nilai
                </a>
            </li>
            <li class="">
                <a href="javascript:void(0)" class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown">
                    <span class="selected"></span>
                    Setting <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="">
                        <a href="">
                            User Management
                        </a>
                    </li>
                    <li class="">
                        <a href="">
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
                    <i class="clip-chevron-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="">
                            <i class="clip-user-2"></i>
                            &nbsp;My Profile
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ URL::to('do_logout') }}">
                            <i class="clip-exit"></i>
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
