
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
			<li><a href="{{route('abouts.index')}}"><em class="fa fa-bar-chart">&nbsp;</em> About</a></li>
			<li><a href="{{route('contacts.index')}}"><em class="fa fa-toggle-off">&nbsp;</em> Contact Us</a></li>
			<li><a href="{{route('teams.index')}}"><em class="fa fa-clone">&nbsp;</em>Team</a></li>
            <li><a href="{{route('questions.index')}}"><em class="fa fa-clone">&nbsp;</em>Questions</a></li>
            <li><a href="{{route('services.index')}}"><em class="fa fa-clone">&nbsp;</em>Services</a></li>
            <li><a href="{{route('testimonies.index')}}"><em class="fa fa-clone">&nbsp;</em>Testimonies</a></li>
            <li><a href="{{route('users.index')}}"><em class="fa fa-clone">&nbsp;</em>Users</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
					</a></li>
				</ul>
			</li>
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
        </div><!--/.sidebar-->
