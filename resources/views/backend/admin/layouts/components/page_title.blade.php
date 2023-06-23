<div class="app-page-title px-4 py-3" style="background: none !important;">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            @yield('back')
            <div>
                @yield('page_title')
                <div class="page-title-subheading">
                    @yield('page_title_sub')
                </div>
            </div>
        </div>

        <div class="page-title-actions">
            @yield('page_title_buttons')
        </div>
    </div>
</div>