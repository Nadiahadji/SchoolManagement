<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Ma Gestion</div>
            <a class="nav-link" href="{{url('/dashboard')}}">
                <div class="sb-nav-link-icon">
                    <img src="{{asset('images/icons/dash.webp')}}" width="25px">              
                
                </div>
                Dashboard
            </a>
            

            <a class="nav-link" href="/users">
                <div class="sb-nav-link-icon">
                  <img src="{{asset('images/icons/users.webp')}}" width="25px">              
                 </div>
                Users
            </a>

            <a class="nav-link" href="/eleves">
                <div class="sb-nav-link-icon">
                    <img src="{{asset('images/icons/student.webp')}}" width="25px">              

 </div>
                Condidats
            </a>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon">
                    <img src="{{asset('images/icons/dip.webp')}}" width="25px">              
                 </div>
                Formations
            </a>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon">
                    <img src="{{asset('images/icons/tech.webp')}}" width="25px">              
                 </div>
                Formateurs
            </a>

            <div class="sb-sidenav-menu-heading">Dépenses</div>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon">
                    <img src="{{asset('images/icons/moneyy.webp')}}" width="25px">              
                 </div>
                 Enregistrer un achat
                </a>
       
            {{-- <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Authentication
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="login.html">Login</a>
                            <a class="nav-link" href="register.html">Register</a>
                            <a class="nav-link" href="password.html">Forgot Password</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                        Error
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="401.html">401 Page</a>
                            <a class="nav-link" href="404.html">404 Page</a>
                            <a class="nav-link" href="500.html">500 Page</a>
                        </nav>
                    </div>
                </nav>
            </div> --}}
   
        </div>
    </div>
  
</nav>

