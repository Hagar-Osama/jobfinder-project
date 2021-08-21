
          <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="{{route('admin.index')}}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="{{route('categories.index')}}"><em><i class="fa fa-list-alt" aria-hidden="true"></i>&nbsp;</em> Categories</a></li>
			<li><a href="{{route('abouts.index')}}"><em class="fa fa-info">&nbsp;</em> About</a></li>
			<li><a href="{{route('teams.index')}}"><em class="fa fa-users">&nbsp;</em>Team</a></li>
            <li><a href="{{route('questions.index')}}"><em class="fa fa-question-circle">&nbsp;</em>Questions</a></li>
            <li><a href="{{route('services.index')}}"><em><i class="fa fa-rocket" aria-hidden="true"></i>&nbsp;</em>Services</a></li>
            <li><a href="{{route('testimonies.index')}}"><em class="fa fa-stack-exchange">&nbsp;</em>Testimonies</a></li>
            <li><a href="{{route('users.index')}}"><em class="fa fa-user">&nbsp;</em>Users</a></li>
            <li><a href="{{route('types.index')}}"><em class="fa fa-history">&nbsp;</em>Job Types</a></li>
            <li><a href="{{route('companies.index')}}"><em class="fa fa-building">&nbsp;</em>Companies</a></li>
            <li><a href="{{route('locations.index')}}"><em class="fa fa-location-arrow">&nbsp;</em>Locations</a></li>
            <li><a href="{{route('jobs.index')}}"><em class="fa fa-suitcase">&nbsp;</em>Jobs</a></li>
            <li><a href="{{route('contacts.index')}}"><em class="fa fa-address-book">&nbsp;</em> Contact Us</a></li>
            <li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </div><!--/.sidebar-->
