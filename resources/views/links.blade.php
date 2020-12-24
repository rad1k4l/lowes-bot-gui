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
                        <div class="col s6  right-align-lg" id="plusButton" >
                            <a @click="add()" class="btn-floating mb-1 btn-large waves-effect waves-light "><i class="material-icons">add</i></a>
                        </div>
                    </div>
                    <div class="col s12">
                      <table id="multi-select" class="display">
                        <thead>
                          <tr>

                              <th>URL</th>
                              <th>İstifadəçi</th>
                              <th>Check Sayı</th>
                              <th>Əməliyyat</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($links as $link)
                          <tr>

                            <td> {{ $link->url }} </td>
                            <td> {{ $link->user()->name  ?? "undefined"}} </td>
                            <td> {{ $link->check }} </td>
                            <td>
                                <a style="color: green;" href="#">Redaktə</a> ||
                                <a   @click.prevent = "del({{ $link->id }})" style="color:red;cursor: pointer">
                                    Sil
                                </a>
                            </td>
                          </tr>
                        @endforeach

                        </tbody>

                        <tfoot>
                        <tr>
                            <th>URL</th>
                            <th>İstifadəçi</th>
                            <th>Check Sayı</th>
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

