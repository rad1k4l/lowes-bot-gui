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
                               <div class="row">
                                   <div class="container">
                                       <div class="col s6">
                                           <a target="_blank" href="{{  $link->url }}">Keçid</a> <br>
                                           İstifadəçi : {{ $link->user()->name }}
                                       </div>
                                       <div class="col s6">
                                            <span style="color: red;"> Ümümi Tarixcə sayı : {{ $history->count() }}</span>
                                       </div>
                                   </div>
                               </div>
                            </h4>
                        </div>
                    </div>
                      @php
                          $history = $link->histories();
                          date_default_timezone_set("Asia/Baku");
                      @endphp
                    <div class="col s12">
                      <table id="multi-select" class="display">
                        <thead>
                          <tr>
                              <th>Qiymət</th>
                              <th >Daşınma Statusu</th>
                              <th>Qeydə alınıb</th>

                          </tr>
                        </thead>
                        <tbody>
                            @foreach($history as $k => $item)
                              <tr>
                                <td
                                    @if( ($k !== ($history->count()-1)) && $history[$k+1]->price !== $item->price)
                                        style="background-color: rgba(61,243,61,0.64);"
                                    @endif
                                > {{ $item->price }}</td>
                                <td
                                    @if( ($k !== ($history->count()-1)) && $history[$k+1]->shipping_status !== $item->shipping_status)
                                        style="background-color: rgba(61,243,61,0.64);"
                                    @endif
                                > {{ $item->shipping_status }}</td>
                                <td

                                > {{ date("Y/m/d H:i:s" , $item->time)}} </td>

                              </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Qiymət</th>
                                <th>Daşınma Statusu</th>
                                <th>Qeydə alınıb</th>

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

