<?php
  $uri = service('uri');

 ?>

<?php if ((session()->get('isLogedIn')) && (session()->get('loginUser')=='Admin')): ?>

<ul class="navbar-nav">
 <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
   <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='profile' ? 'active' : null )?>"">
   <a class="nav-link" href="/profile">Profile</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='courses' ? 'active' : null )?>"">
   <a class="nav-link" href="/courses">Courses</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='createcourse' ? 'active' : null )?>"">
   <a class="nav-link" href="/createcourse">Create Course</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='teachers' ? 'active' : null )?>"">
   <a class="nav-link" href="/teachers">Teaachers</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='studens' ? 'active' : null )?>"">
   <a class="nav-link" href="/students">Students</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='grades' ? 'active' : null )?>"">
   <a class="nav-link" href="/grades">Grades</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='groups' ? 'active' : null )?>"">
   <a class="nav-link" href="/groups">Groups</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='schedules' ? 'active' : null )?>"">
   <a class="nav-link" href="/schedules">Schedules</a>
 </li>
</ul>

<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/logout">Logout</a>
 </li>
</ul>

<?php elseif((session()->get('isLogedIn')) && (session()->get('loginUser')=='Staff')):?>
<ul class="navbar-nav">
 <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
   <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='profile' ? 'active' : null )?>"">
   <a class="nav-link" href="/profile">Profile</a>
 </li>


 <li class="nav-item <?=($uri->getSegment(1)=='teachers' ? 'active' : null )?>"">
   <a class="nav-link" href="/teachers">Teaachers</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='studens' ? 'active' : null )?>"">
   <a class="nav-link" href="/students">Students</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='groups' ? 'active' : null )?>"">
   <a class="nav-link" href="/groups">Groups</a>
 </li>

</ul>

<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/logout">Logout</a>
 </li>
</ul>
<?php elseif((session()->get('isLogedIn')) && (session()->get('loginUser')=='Teacher')):?>
<ul class="navbar-nav">
 <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
   <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='profile' ? 'active' : null )?>"">
   <a class="nav-link" href="/profile">Profile</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='courses' ? 'active' : null )?>"">
   <a class="nav-link" href="/courses">Courses</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='createcourse' ? 'active' : null )?>"">
   <a class="nav-link" href="/createcourse">Create Course</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='grades' ? 'active' : null )?>"">
   <a class="nav-link" href="/grades">Grades</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='groups' ? 'active' : null )?>"">
   <a class="nav-link" href="/groups">Groups</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='schedules' ? 'active' : null )?>"">
   <a class="nav-link" href="/schedules">Schedules</a>
 </li>
</ul>

<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/logout">Logout</a>
 </li>
</ul>
<?php elseif((session()->get('isLogedIn')) && (session()->get('loginUser')=='Parent')):?>
<ul class="navbar-nav">
 <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
   <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='profile' ? 'active' : null )?>"">
   <a class="nav-link" href="/profile">Profile</a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='grades' ? 'active' : null )?>"">
   <a class="nav-link" href="/grades">Grades</a>
 </li>
<li class="nav-item <?=($uri->getSegment(1)=='schedules' ? 'active' : null )?>"">
   <a class="nav-link" href="/schedules">Schedules</a>
 </li>
</ul>

<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/logout">Logout</a>
 </li>
</ul>
<?php elseif((session()->get('isLogedIn')) && (session()->get('loginUser')=='Student')):?>
<ul class="navbar-nav">
 <li class="nav-item <?=($uri->getSegment(1)=='dashboard' ? 'active' : null )?>">
   <a class="nav-link" href="/dashboard">Dashboard <span class="sr-only">(current)</span></a>
 </li>
 <li class="nav-item <?=($uri->getSegment(1)=='profile' ? 'active' : null )?>"">
   <a class="nav-link" href="/profile">Profile</a>
 </li>


 <li class="nav-item <?=($uri->getSegment(1)=='grades' ? 'active' : null )?>"">
   <a class="nav-link" href="/grades">Grades</a>
 </li>

 <li class="nav-item <?=($uri->getSegment(1)=='schedules' ? 'active' : null )?>"">
   <a class="nav-link" href="/schedules">Schedules</a>
 </li>
</ul>

<ul class="navbar-nav ml-auto">
 <li class="nav-item ">
   <a class="nav-link" href="/logout">Logout</a>
 </li>
</ul>
<?php else:?>
<ul class="navbar-nav">

<li class="nav-item <?=($uri->getSegment(1)=='' ? 'active' :null )?>"">
 <a class="nav-link" href="/">Login</a>
</li>
<li class="nav-item <?=($uri->getSegment(1)=='register' ? 'active' : null )?>"">
 <a class="nav-link" href="/register">Register</a>
</li>
</ul>
<?php endif;?>
