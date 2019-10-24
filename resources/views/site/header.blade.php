@if(isset($pages) && is_object($pages))
    <header id="header_wrapper">
        <div class="container">
            <div class="header_box">
                <div class="logo"><a href="#"><img src="/assets/img/logo.png" alt="logo"></a></div>
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="navbar-header">
                        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse"
                                data-target="#main-nav"><span class="sr-only">Toggle navigation</span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="main-nav" class="collapse navbar-collapse navStyle">
                        <ul class="nav navbar-nav" id="mainNav">
                            @foreach($pages as $page)
                                <li><a href="#{{ $page->alias }}" class="scroll-link">{{ $page->name }}</a></li>
                            @endforeach
                            <li><a href="#service" class="scroll-link">Services</a></li>
                            <li><a href="#Portfolio" class="scroll-link">Portfolio</a></li>
                            <li><a href="#clients" class="scroll-link">Clients</a></li>
                            <li><a href="#team" class="scroll-link">Team</a></li>
                            <li><a href="#contact" class="scroll-link">Contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
@endif

@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if($errors->any())
{{--    {{ dd($errors->all()) }}--}}
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
