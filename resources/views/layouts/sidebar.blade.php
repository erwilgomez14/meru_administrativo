    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">

                @foreach ($menu as $key => $item)
                @if ($item['padre'] != 0)
                    @break
                @endif
                @include('layouts.menu-item', ['item' => $item])
                @endforeach

            </ul>

        </nav>

    </div>
