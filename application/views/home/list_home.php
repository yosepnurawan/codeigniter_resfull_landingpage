<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Page Home
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Soal 1</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                16, 06, 68, 88, X, 98. Berapa nilai X pada bilangan deret tersebut?
            </div>
            <div class="box-body" style="font-weight: bold;">
                Answer :
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div id="app">
                    <div align="left">
                        16 - 06 - 68 - 88 - X - 98 &nbsp;<a v-on:click="isHidden = !isHidden">[click hide and show rotate]</a>
                    </div>
                    <div>&nbsp;</div>
                    <transition name="slide-fade">
                        <div v-if="!isHidden">
                            <div :style="style" align="left">
                                {{ number1 }} - {{ number2 }} - {{ number3 }} - {{ number4 }} - {{ number5 }} - {{ number6 }}
                            </div>
                            <div align="left" style="font-weight: bold;">
                                X = 87 and when roate is L8
                            </div>
                        </div>
                    </transition>
                </div>
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    var app = new Vue({
        el: '#app',
        data: {
            number1: '16',
            number2: '06',
            number3: '68',
            number4: '88',
            number5: 'X',
            number6: '98',
            turn: 0.5,
            isHidden: true
        },
        computed: {
            style() {
                return {
                    transform: 'rotate(' + this.turn + 'turn)',
                    width: '130px'
                }
            }
        }
    })
</script>

<style scoped>
    /* Enter and leave animations can use different */
    /* durations and timing functions.              */
    .slide-fade-enter-active {
        transition: all .3s ease;
    }

    .slide-fade-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }

    .slide-fade-enter,
    .slide-fade-leave-to

    /* .slide-fade-leave-active below version 2.1.8 */
        {
        transform: translateX(10px);
        opacity: 0;
    }
</style>