
@section("input-modal")

    <div id="input-modal" class="modal col s4" style="width: 541px;">
        <div class="modal-content">
            <div v-for="(source , k) in sources" class="input-field">
                <input
                    :id="'input_' + k"
                    :class="{
                    valid : source.error !== undefined && source.error ===false,
                    invalid : source.error !== undefined && source.error === true
                    }"
                    v-if="source.type == 'text' || source.type == 'email' || source.type == 'password'"
                    :type="source.type"
                    v-model="source.data"
                    class="validate"
                    ref = "input"
                    v-on:keydown.enter="submit()"
                >
                <textarea
                    :id="'input_' + k"
                    :class="{ valid : source.error !== undefined && source.error ===false,
                            invalid : source.error !== undefined && source.error === true ,}"
                    v-if="source.type == 'textarea'"
                    cols="30"
                    rows="10"
                    class="validate"
                ></textarea>
                <label
                    :for="'input_' + k"
                    :data-error="source.onError ?source.onError : 'Invalid input'"
                    :data-success="source.onSuccess  ? source.onSuccess : ''"
                    :class="{active : source.data ? true : false && source.data.length > 0 }"
                >
                    @{{ source.label ? source.label :  k}}
                </label>
            </div>
        </div>
        <div class="modal-footer carousel-fixed-item center ">
            <button @click.prevent ="submit()"  class="moveNextCarousel middle-indicator-text btn btn-flat purple-text waves-effect waves-light btn-next">
                <span class="hide-on-small-only">Təsdiqlə</span>
            </button>
        </div>
    </div>


@show


@section("modal-js")
    <script>
        var modal = new Vue({
            el : "#input-modal",
            data : {
                sources : { },
                onSubmit : null,
                modInstance : null
            },
            methods : {
                setup : function(){
                    this.modInstance = $('#input-modal').modal({
                        dismissible: true,
                        opacity: .5,
                        inDuration: 150,
                        outDuration: 150,
                        startingTop: '3%',
                        endingTop: '25%',
                        ready: function(modal, trigger) {
                            console.log("ready modal ");
                        },
                        complete: function() {
                            console.log("complete modal");
                        }
                    });
                },
                openModal : function ( ) {
                    if (this.modInstance == null){
                        this.setup();
                    }
                    this.modInstance.modal("open");
                },
                close : function (){
                    if(this.modInstance !== null){
                        this.modInstance.modal("close");
                    }
                },
                open : function (arguments , callable) {
                    this.sources = arguments;
                    this.onSubmit = callable;
                    this.openModal();
                },
                submit : function () {
                    this.close();

                    if (this.onSubmit !== null && typeof this.onSubmit === 'function' ){
                        this.onSubmit(this.sources);
                    }
                }
            }
        });

    </script>

@show
