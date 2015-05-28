<!-- start: HEADER -->
<div class="navbar my-navbar navbar-fixed-top">
    
    <div class="navbar-header">

        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="clip-list-2"></span>
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
        </button>
        
        <a class="navbar-brand" href="{{ URL::to('siswa/') }}">
           <strong>E-Learning SMKN 56 Jakarta</strong> 
        </a>
    </div> 


    <div class="horizontal-menu navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class=''>
                <a href=""> </a>
            </li>
            <li class=''>
                <a href="{{ URL::to('siswa/') }}">
                    Dashboard
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('siswa/materi') }}">
                    Materi   
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('siswa/tugas') }}">
                    Tugas
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('siswa/kuis') }}">
                    Kuis
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('siswa/ujian') }}">
                    Ujian
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('siswa/forum') }}">
                    Forum
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                    Hi, Siswa<span class="username"></span>
                    <span class="caret">
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ URL::to('siswa/profile') }}">
                            <i class="glyphicon glyphicon-user"></i>
                            &nbsp;Profil
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ URL::to('siswa/change_password') }}">
                            <i class="glyphicon glyphicon-wrench"></i>
                            &nbsp;Ubah Password
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ URL::to('do_logout') }}">
                            <i class="glyphicon glyphicon-log-out"></i>
                            &nbsp;Keluar
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
