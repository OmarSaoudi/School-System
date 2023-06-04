<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="header">MASTER</li>
      <li><a href="{{ route('grades.index') }}"><i class="fa fa-graduation-cap"></i> <span>Grades</span></a></li>
      <li><a href="{{ route('classrooms.index') }}"><i class="fa fa-building"></i> <span>Classrooms</span></a></li>
      <li><a href="{{ route('sections.index') }}"><i class="fa fa-square"></i> <span>Sections</span></a></li>

      <li><a href="{{ route('myparents.index') }}"><i class="fa fa-slack"></i> <span>Parents</span></a></li>

      <li><a href="{{ route('teachers.index') }}"><i class="fa fa-briefcase"></i> <span>Teachers</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-users"></i> <span>Students</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
          <li><a href="{{ route('students.index') }}"><i class="fa fa-users"></i> <span>Students</span></a></li>
          <li><a href="{{ route('promotions.index') }}"><i class="fa fa-square"></i> <span>Promotions</span></a></li>
          <li><a href="{{ route('promotions.create') }}"><i class="fa fa-square"></i> <span>List Promotions</span></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-money"></i> <span>Fees</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
        <ul class="treeview-menu">
          <li><a href="{{ route('fees.index') }}"><i class="fa fa-square"></i> <span>Fees</span></a></li>
          <li><a href="{{ route('fee_invoices.index') }}"><i class="fa fa-square"></i> <span>Fee Invoices</span></a></li>
          <li><a href="{{ route('receipt_students.index') }}"><i class="fa fa-square"></i> <span>Receipt Students</span></a></li>
          <li><a href="{{ route('processing_fees.index') }}"><i class="fa fa-square"></i> <span>Processing Fee Students</span></a></li>
          <li><a href="{{ route('payment_students.index') }}"><i class="fa fa-square"></i> <span>Payment Students</span></a></li>
        </ul>
      </li>
      <li><a href="{{ route('attendances.index') }}"><i class="fa fa-square"></i> <span>Attendances</span></a></li>
      <li><a href="{{ route('settings.index') }}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
