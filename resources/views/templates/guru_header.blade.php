<!-- start: HEADER -->
<div class="navbar my-navbar navbar-fixed-top">
    
    <div class="navbar-header">

        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="clip-list-2"></span>
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
        </button>
        
        <a class="navbar-brand" href="{{ URL::to('guru/') }}">
           <strong>E-Learning SMKN 56 Jakarta</strong> 
        </a>
    </div> 


    <div class="horizontal-menu navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li class=''>
                <a href=""> </a>
            </li>
            <li class=''>
                <a href="{{ URL::to('guru/') }}">
                    Dashboard
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('guru/materi') }}">
                    Materi   
                </a>
            </li>
            <li class="">
                <a href="javascript:void(0)" class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown">
                    <span class="selected"></span>
                    Tugas <span class="caret"></span><i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li class="">
                        <a href="{{ URL::to('guru/tugas') }}">
                            Daftar Tugas
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ URL::to('guru/jawaban_tugas') }}">
                            Jawaban Tugas
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="{{ URL::to('guru/kuis') }}">
                    Kuis
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('guru/ulangan') }}">
                    Ulangan
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('guru/forum') }}">
                    Forum
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to('guru/nilai') }}">
                    Nilai
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                    Hi, {{ session('username') }} <span class="username"></span>
                    <span class="caret">
                    <!-- <i class="clip-chevron-down"></i> -->
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ URL::to('guru/profile') }}">
                            <i class="glyphicon glyphicon-user"></i>
                            &nbsp;Profil
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ URL::to('guru/change_password') }}">
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
