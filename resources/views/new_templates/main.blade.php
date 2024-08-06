<!DOCTYPE html>
<html lang="en">
  @include('new_templates.head')
  <body>
      <div class="container-scroller" id="main-panel">
          @include('new_templates.navbar')
          <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
              <div id="status">
                <div class="alert alert-dismissible fade show" role="alert">
                  <span id="conn-msg"></span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              </div>
              <div class="content-wrapper">
                @yield('content')
              </div>
            </div>
          </div>
      </div>
  </body>
  @include('new_templates.footer')
</html>