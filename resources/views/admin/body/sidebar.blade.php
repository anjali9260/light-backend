<aside>
    <div class="top">
        <div class="logo">
            <img src="{{ asset('backend/image/logo.png') }}" />
            <h2 class="text-2xl font-bold">EGA<span class="danger">TOR</span></h2>
        </div>
        <div class="close" id="close-btn">
            <span class="material-symbols-sharp">close</span>
        </div>
    </div>
    {{-- class="{{ Request::url() == url('/admin/brand') || url('/admin/brand/create')? 'active' : '' }} list" --}}
    <div class="sidebar">
        <a href="#">
            <span class="material-symbols-sharp">grid_view</span>
            <h3 class="font-medium text-lg">Dashboard</h3>
        </a>
        <a href="{{ route('brand.index') }}" class="{{ request()->segment(1) == 'admin' ? 'active' : '' }} list">
            <span class="material-symbols-sharp">person_outline</span>
            <h3 class="font-medium text-base">Brand</h3>
        </a>
        <a href="{{ route('category.index') }}" class=" list">
            <span class="material-symbols-sharp">receipt_long</span>
            <h3 class="font-medium text-base">Category</h3>
        </a>
        <a href="{{ route('subcategory.index') }}" class="list">
            <span class="material-symbols-sharp">insights</span>
            <h3 class="font-medium text-base">SubCategory</h3>
        </a>
        <a href="{{ route('product.index') }}" class="list">
            <span class="material-symbols-sharp">inventory</span>
            <h3 class="font-medium text-base">Products</h3>
        </a>
        <a href="{{ route('post.index') }}" class="list">
            <span class="material-symbols-sharp">report_gmailerrorred</span>
            <h3 class="font-medium text-base">Post</h3>
        </a>
        <a href="{{ route('tag.index') }}" class="list">
            <span class="material-symbols-sharp">settings</span>
            <h3 class="font-medium text-base">Tag</h3>
        </a>
        {{-- <a href="#" class="list">
        <span class="material-symbols-sharp">mail_outline</span>
        <h3 class="font-medium text-base">Messages</h3>
        <span class="message-count">26</span>
      </a>


      <a href="#" class="list">
        <span class="material-symbols-sharp">add</span>
        <h3 class="font-medium text-base">Add Product</h3>
      </a> --}}

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                <span class="material-symbols-sharp">logout</span>
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>


    </div>
</aside>
