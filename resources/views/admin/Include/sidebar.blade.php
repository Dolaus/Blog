<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">

        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="{{route('admin.category.index')}}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Категорії
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{route('admin.tag.index')}}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Теги
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{route('admin.post.index')}}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Пости
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Користувачі
                    </p>
                </a>
            </li>

        </ul>



    </div>
    <!-- /.sidebar -->
</aside>
