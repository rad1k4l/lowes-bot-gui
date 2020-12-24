 @extends("layout.app")

@section("content")

<!-- BEGIN: Page Main-->
<div id="main">
  <div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
      <!-- Search for small screen-->
    </div>
    <div class="col s12">
      <div class="container">
        <div class="section section-data-tables">
            <style>
                .debug {
                    border-style: groove;
                    border-color: red;
                }
            </style>
          <div class="row" id="links-app">
            <div class="col s12">
              <div class="card">
                <div class="card-content">
                  <div class="row">
                    <div class="row col s12  ">
                        <div class="col s6  ">
                            <h4 class="card-title">

                            </h4>
                        </div>
                    </div>
                    <div class="col s12">
                      <table id="multi-select" class="display">
                        <thead>
                          <tr>
                              <th>URL</th>
                              <th>Son Tarix</th>
                              <th>Tarixcə Sayı</th>
                              <th>Əməliyyat</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($links as $k => $link)
                            @php
                                $history = $link->histories();
                                date_default_timezone_set("Asia/Baku");
                            @endphp

                            @if($history->count() === 0 )
                                @continue
                            @endif

                          <tr>
                            <td> {{ $link->url }} </td>
                            <td> {{ date("Y/m/d H:i:s" , $history->first()->time)}} </td>
                            <td> {{ $history->count() }} </td>
                            <td>
                                <a style="color: green;" href="{{ route("link.history.show" , [ "id" => $link->id  , "data" => "static" , "do" => time()] ) }}">İzlə</a>
                            </td>
                          </tr>
                        @endforeach

                        </tbody>

                        <tfoot>
                        <tr>
                            <th>URL</th>
                            <th>Son Tarix</th>
                            <th>Tarixcə Sayı</th>
                            <th>Əməliyyat</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section("application_javascript")
@include("clibs.input-modal")
    <script>

        let links_app = new Vue({
            el : "#links-app",
            data : {
                modalTemplate : {
                    url : {
                        type  : "text",
                        label : "Link"
                    }
                }
            },
            methods : {
                add : function (){
                    modal.open(this.modalTemplate, function (submitted) {
                        axios.post("{{ route("links.create") }}", {
                            url : submitted.url.data
                        }).then (response => {
                            if(response.status === 200 ){
                                if (response.data.status === "OK") {
                                    window.location.reload();
                                }
                            }
                        }).catch();
                    });
                },
                del : function (id) {
                    axios.post("{{ route("links.delete") }}", {
                        link_id : id
                    }).then (response => {
                        if(response.status === 200 ){
                            if (response.data.status === "OK") {
                                window.location.reload();
                            }
                        }
                    }).catch();
                }
            }
        })

    </script>
    @endsection

