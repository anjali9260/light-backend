<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Admin Dashboard</title>
    <link rel="stylesheet"
        href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}" />
    @vite('resources/css/app.css')
</head>

<body>

    <div class="container1">

        @includeIf('admin.body.sidebar')

        <div class="maincontainer">

            <main>
                <div class="upper">
                    <div class="upper-left">
                        <h1 class="text-black text-3xl font-bold">Dashboard</h1>
                    </div>
                    <div class="upper-right">
                        <div class="top">
                            <button id="menu-btn">
                                <span class="material-symbols-sharp">menu</span>
                            </button>
                            <div class="profile">
                                <div class="info">
                                    <p class="font-medium text-xl"><b>Daniel</b></p>
                                    <small class="font-medium text-base">Admin</small>
                                </div>
                                <div class="profile-photo">
                                    <img src="{{ asset('backend/image/profile.jpg') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-wrap">
                    @yield('admin')
                </div>
            </main>

        </div>

    </div>
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script src="{{ asset('backend/js/script.js') }}"></script>
    @yield('custom_JS')
</body>

</html>
