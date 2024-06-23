<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
        <div class="avatar">
    <img src="{{ asset('admincss/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle">
</div>

          <div class="title">
          <a href="admin-dashboard">
            <h1 class="h5">Admin Pannel</h1>
            <!-- <p>Hamro Electronics</p> -->
          </div>
        </div>
        <!-- Sidebar Navidation Menus-->
         <!-- <span class="heading">Main</span> -->
        <ul class="list-unstyled">
                <li class ="active"><a href="home"> <i class="icon-home"></i>Home </a></li>

                <li>
                  <a href="{{route('view.category')}}"> <i class="icon-grid"></i>Category </a></li>
                
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Products </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{route('add_product')}}">Add Product</a></li>
                    <li><a href="{{route('view_product')}}">View Product</a></li>
                    
                    
                  </ul>
                  </li>

                  <li>
                  <a href="{{route('view_order')}}"><i class="fa fa-shopping-cart fa-4x" aria-hidden="true"></i>Orders </a></li>
                
        </ul>
      </nav>